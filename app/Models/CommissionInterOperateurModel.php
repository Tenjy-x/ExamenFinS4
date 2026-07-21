<?php

namespace App\Models;

use CodeIgniter\Model;

class CommissionInterOperateurModel extends Model {
    protected $table = 'Commission_inter_operateur';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_operateur',
        'pourcentage'
    ];
    protected $returnType = 'object';

    public function getAll() {
        $db = $this->db->table('Commission_inter_operateur c');
        $db->select('c.*, o.nom AS operateur_nom');
        $db->join('Operateur o', 'c.id_operateur = o.id');
        $db->orderBy('o.nom');
        return $db->get()->getResult();
    }

    public function getCommission($id_operateur) {
        return $this->where('id_operateur', $id_operateur)->first();
    }
}
