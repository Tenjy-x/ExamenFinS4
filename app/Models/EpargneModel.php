<?php

namespace App\Models;

use CodeIgniter\Model;

class EpargneModel extends Model {
    protected $table = 'Epargne';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_client', 'pourcentage'];
    protected $returnType = 'object';

    public function getAll(){
        return $this->findAll();
    }

    public function getByClient($id_client){
        return $this->where('id_client', $id_client)->first();
    }
}