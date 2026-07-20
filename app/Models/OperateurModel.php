<?php

namespace App\Models;

use CodeIgniter\Models;

class OperateurModel extends Model {
    protected $table = 'Operateur';
    protected $primarykey = 'id';
    protected $allowedFields = ['id_prefix', 'mot_de_passe'];

    public function getOperateurByprefixAndPassword ($id_prefix, $mot_de_passe){
        return $this->where('id_prefix', $id_prefix)->where('mot_de_passe', $mot_de_passe)->first();
    }
}