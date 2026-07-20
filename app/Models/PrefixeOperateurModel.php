<?php

namespace App\Models;

use CodeIgniter\Models;

class PrefixeOperateurModel extends Model {
    protected $table = 'Prefixe_operateur';
    protected $primarykey = 'id';
    protected $allowedFields = ['prefixe'];

    public function getAllPrefix(){
        return $this->findAll();
    }
}