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
        'montant',
        'frais'
    ];

    public function getByClient($id_client)
    {
        return $this->where('id_client', $id_client)
                    ->orderBy('id', 'DESC')
                    ->findAll();
    }

    public function getSolde($id_client)
    {
        $db = $this->db->table('Transaction');

        $depots = $db
            ->selectSum('montant')
            ->where('id_client', $id_client)
            ->where('id_type', 1)
            ->get()
            ->getRow()
            ->montant ?? 0;

        $retraits = $this->db->table('Transaction')
            ->select('COALESCE(SUM(montant + frais), 0) AS total')
            ->where('id_client', $id_client)
            ->where('id_type', 2)
            ->get()
            ->getRow()
            ->total;

        $transfertsEnvoyes = $this->db->table('Transaction')
            ->select('COALESCE(SUM(montant + frais), 0) AS total')
            ->where('id_client', $id_client)
            ->where('id_type', 3)
            ->get()
            ->getRow()
            ->total;

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
            ->select('tt.libelle, SUM(t.frais) AS total_gains')
            ->join('Type_transaction tt', 't.id_type = tt.id')
            ->groupBy('tt.libelle')
            ->get()
            ->getResult();
    }
}