<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'Transaction';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_client',
        'id_client2',
        'id_type',
        'id_tranche',
        'montant'
    ];

    public function getByClient($id_client)
    {
        return $this->where('id_client', $id_client)
                    ->orderBy('id', 'DESC')
                    ->findAll();
    }

    public function getSolde($id_client)
    {
        // Dépôts
        $depots = $this->db->table('Transaction')
            ->selectSum('montant')
            ->where('id_client', $id_client)
            ->where('id_type', 1)
            ->get()
            ->getRow()
            ->montant ?? 0;

        // Retraits
        $retraits = $this->db->table('Transaction t')
            ->select('SUM(t.montant + tr.Frais) AS total_retrait')
            ->join('Tranche tr', 't.id_tranche = tr.id')
            ->where('t.id_client', $id_client)
            ->where('t.id_type', 2)
            ->get()
            ->getRow()
            ->total_retrait ?? 0;

        // Transferts envoyés
        $transfertsEnvoyes = $this->db->table('Transaction t')
            ->select('SUM(t.montant + tr.Frais) AS total_transfert')
            ->join('Tranche tr', 't.id_tranche = tr.id')
            ->where('t.id_client', $id_client)
            ->where('t.id_type', 3)
            ->get()
            ->getRow()
            ->total_transfert ?? 0;

        // Transferts reçus
        $transfertsRecus = $this->db->table('Transaction')
            ->selectSum('montant')
            ->where('id_client2', $id_client)
            ->where('id_type', 3)
            ->get()
            ->getRow()
            ->montant ?? 0;

        return ($depots + $transfertsRecus) - ($retraits + $transfertsEnvoyes);
    }

    public function getGainsByType()
    {
        return $this->db->table('Transaction t')
            ->select('tt.libelle, SUM(tr.Frais) AS total_gains')
            ->join('Type_transaction tt', 't.id_type = tt.id')
            ->join('Tranche tr', 't.id_tranche = tr.id')
            ->groupBy('tt.libelle')
            ->get()
            ->getResult();
    }
}