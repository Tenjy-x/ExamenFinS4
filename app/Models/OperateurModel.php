<?php

namespace App\Models;

use CodeIgniter\Model;

class OperateurModel extends Model {
    protected $table = 'Operateur';
    protected $primarykey = 'id';
    protected $allowedFields = ['nom', 'mot_de_passe'];
    protected $returnType = 'object';

    public function getOperateurByNomAndPassword ($nom, $mot_de_passe){
        return $this->where('nom', $nom)->where('mot_de_passe', $mot_de_passe)->first();
    }

    public function getPrefixesByOperateur($operateur_id) {
        return $this->db->table('Prefix_operateur')
            ->select('id, Prefix AS Prefix')
            ->where('id_operateur', $operateur_id)
            ->get()
            ->getResult();
    }

    public function getOperateurByPrefix($prefix) {
        $row = $this->db->table('Prefix_operateur')
            ->where('Prefix', $prefix)
            ->get()
            ->getRow();
        return $row ? $row->id_operateur : null;
    }
}
