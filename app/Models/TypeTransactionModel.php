<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeTransactionModel extends Model {
    protected $table = 'Type_transaction';
    protected $primarykey = 'id';
    protected $allowedFields = ['libelle'];
    protected $returnType = 'object';

    public function getAllType(){
        return $this->findAll();
    }
}