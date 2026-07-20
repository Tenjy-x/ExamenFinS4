<?php

namespace App\Models;

use CodeIgniter\Model;

class PrefixeOperateurModel extends Model {
    protected $table = 'Prefix_operateur';
    protected $primarykey = 'id';
    protected $allowedFields = ['Prefix'];
    protected $returnType = 'object';

    public function getAllPrefix(){
        return $this->findAll();
    }
}