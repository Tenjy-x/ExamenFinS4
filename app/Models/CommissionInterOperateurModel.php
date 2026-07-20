<?php

namespace App\Models;

use CodeIgniter\Model;

class CommissionInterOperateurModel extends Model {
    protected $table = 'Commission_inter_operateur';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'operateur_emetteur_id',
        'operateur_destinataire_id',
        'commission_pourcentage'
    ];
    protected $returnType = 'object';

    public function getAll() {
        $db = $this->db->table('Commission_inter_operateur c');
        $db->select('c.*, oe.nom AS emetteur_nom, od.nom AS destinataire_nom');
        $db->join('Operateur oe', 'c.operateur_emetteur_id = oe.id');
        $db->join('Operateur od', 'c.operateur_destinataire_id = od.id');
        $db->orderBy('oe.nom, od.nom');
        return $db->get()->getResult();
    }

    public function getCommission($emetteur_id, $destinataire_id) {
        return $this->where('operateur_emetteur_id', $emetteur_id)
            ->where('operateur_destinataire_id', $destinataire_id)
            ->first();
    }
}
