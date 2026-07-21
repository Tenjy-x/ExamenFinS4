<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionModel extends Model {
    protected $table = 'Promotion';
    protected $primarykey = 'id';
    protected $allowedFields = ['pourcentage'];
    protected $returnType = 'array';

    public function getProm($id) {
        return $this->where('id', $id)->first();
    }
}