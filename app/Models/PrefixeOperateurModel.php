<?php

namespace App\Models;

use CodeIgniter\Model;

class PrefixeOperateurModel extends Model {
    protected $table = 'Prefix_operateur';
    protected $primarykey = 'id';
    protected $allowedFields = ['Prefix', 'id_operateur'];
    protected $returnType = 'object';

    public function getAllPrefix(){
        return $this->findAll();
    }
}