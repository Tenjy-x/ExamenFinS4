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
        $db = $this->db->table('Operateur_prefix op');
        $db->select('p.id, p.Prefix');
        $db->join('Prefix_operateur p', 'op.prefix_id = p.id');
        $db->where('op.operateur_id', $operateur_id);
        return $db->get()->getResult();
    }

    public function getOperateurByPrefix($prefix) {
        $db = $this->db->table('Operateur_prefix op');
        $db->select('o.id, o.nom');
        $db->join('Operateur o', 'op.operateur_id = o.id');
        $db->join('Prefix_operateur p', 'op.prefix_id = p.id');
        $db->where('p.Prefix', $prefix);
        return $db->get()->getRow();
    }

    public function getAllOperateurs() {
        return $this->findAll();
    }
}
