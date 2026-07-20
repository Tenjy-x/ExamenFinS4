<?php

namespace App\Models;

use CodeIgniter\Models;

class TypeTransactionModel extends Model {
    protected $table = 'Type_transaction';
    protected $primarykey = 'id';
    protected $alowedFields = ['libelle'];

    public function getAllType(){
        return $this->findAll();
    }
}