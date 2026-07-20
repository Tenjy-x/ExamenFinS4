<?php 

namespace App\Models;

use CodeIgniter\Model;

class TrancheModel extends Model {
    protected $table = 'Tranche';
    protected $primarykey = 'id';
    protected $allowedFields = ['id_type', 'montant_min', 'montant_max', 'Frais'];

    public function getTrancheByType($id_type) {
        return $this->where('id_type', $id_type)->findAll();
    }

    public function findTranche($id_type, $montant){
        return $this->where('id_type', $id_type)
        ->where('montant_min <=', $montant)
        ->where('montant_max >=', $montant)->first();
    }
}