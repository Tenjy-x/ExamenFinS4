<?php

namespace App\Models;

use CodeIgniter\Models;

class TransacrionModel extends Model {
    protected $table = 'Transaction';
    protected $primarykey = 'id';
    protected $allowedFields = ['id_client', 'id_client2', 'id_type', 'id_tranche', 'montant'];

    public function getByClient($id_client){
        return $this->where('id_client', $id_client)->orderBy('id', 'DESC')->findAll();
    }

    public function getSolde($id_client){
        $soldes = 0;
        $depots = $this->selectSum('montant')->where('id_client', $id_client)
        ->where('id_type', 1)->get()->getRow()->montant;

        $retraits = $this->select('SUM(t.montant + tr.Frais) as total_retrait')
        ->from('Transaction t')
        ->join('Tranche tr', 't.id_tranche = tr.id')
        ->where('t.id_client', $id_client)
        ->where('t.id_type', 2)->get()->getRow()->total_retrait;

        $transferts_evoyes = $this->select('SUM(t.montant + tr.Frais) as total_transfert')
        ->from('Transaction t')
        ->join('Tranche tr', 't.id_tranche = tr.id')
        ->where('t.id_client', $id_client)
        ->where('t.id_type', 3)->get()->getRow()->total_transfert;

        $transferts_recu = $this->selectSum('montant')
        ->where('id_client2', $id_client)
        ->where('id_type', 3)->get()->getRow()->montant;

        $soldes = ($depots + $transferts_recu) - ($retraits + $transferts_evoyes);
        return $soldes;
    }

    public function getGainsByType(){
        return $this->select('tt.libelle, SUM(tr.Frais) as total_gains')
        ->from('Transaction t')
        ->join('Type_transaction tt', 't.id_type = tt.id')
        ->join('Tranche tr', 't.id_tranche = tr.id')
        ->groupBy('t.id_type')
        ->get()->getResult();   
    }

}