<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'Transaction';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_client',
        'id_client2',
        'id_type',
        'id_tranche',
        'montant',
        'frais',
        'commission_inter_operateur',
        'operateur_destinataire_id',
    ];

    public function getByClient($id_client)
    {
        return $this->where('id_client', $id_client)
                    ->orderBy('id', 'DESC')
                    ->findAll();
    }

    public function getSolde($id_client)
    {
        $db = $this->db->table('Transaction');

        $depots = $db
            ->selectSum('montant')
            ->where('id_client', $id_client)
            ->where('id_type', 1)
            ->get()
            ->getRow()
            ->montant ?? 0;

        $retraits = $this->db->table('Transaction')
            ->select('COALESCE(SUM(montant + frais), 0) AS total')
            ->where('id_client', $id_client)
            ->where('id_type', 2)
            ->get()
            ->getRow()
            ->total;

        $transfertsEnvoyes = $this->db->table('Transaction')
            ->select('COALESCE(SUM(montant + frais), 0) AS total')
            ->where('id_client', $id_client)
            ->where('id_type', 3)
            ->get()
            ->getRow()
            ->total;

        $transfertsRecus = $this->db->table('Transaction')
            ->selectSum('montant')
            ->where('id_client2', $id_client)
            ->where('id_type', 3)
            ->get()
            ->getRow()
            ->montant ?? 0;

        return ($depots + $transfertsRecus) - ($retraits + $transfertsEnvoyes);
    }

    public function getGainsByType()
    {
        return $this->db->table('Transaction t')
            ->select('tt.libelle, SUM(t.frais) AS total_gains')
            ->join('Type_transaction tt', 't.id_type = tt.id')
            ->groupBy('tt.libelle')
            ->get()
            ->getResult();
    }

    public function getRecentTransactions($limit = 4)
    {
        return $this->db->table('Transaction t')
            ->select('t.id, t.montant, t.id_type, t.id_client, c.numero, tt.libelle')
            ->join('Client c', 't.id_client = c.id')
            ->join('Type_transaction tt', 't.id_type = tt.id')
            ->orderBy('t.id', 'DESC')
            ->limit($limit)
            ->get()
            ->getResult();
    }

    public function getCount()
    {
        return $this->db->table('Transaction')
            ->countAllResults();
    }

    private function getClientIdsByOperateur($operateur_id)
    {
        $prefixes = $this->db->table('Prefix_operateur')
            ->select('Prefix')
            ->where('id_operateur', $operateur_id)
            ->get()
            ->getResult();

        $prefixList = array_map(function($p) { return $p->Prefix; }, $prefixes);
        if (empty($prefixList)) return [];

        $rows = $this->db->table('Client')
            ->select('id')
            ->whereIn('SUBSTR(numero, 1, 3)', $prefixList)
            ->get()
            ->getResult();

        return array_map(function($r) { return $r->id; }, $rows);
    }

    public function getGainsSepares($operateur_id)
    {
        $clientIds = $this->getClientIdsByOperateur($operateur_id);
        if (empty($clientIds)) return ['retrait' => 0, 'interne' => 0, 'autres' => 0];

        $retrait = $this->db->table('Transaction')
            ->selectSum('frais', 'total')
            ->whereIn('id_client', $clientIds)
            ->where('id_type', 2)
            ->get()
            ->getRow()
            ->total ?? 0;

        $interne = $this->db->table('Transaction')
            ->selectSum('frais', 'total')
            ->whereIn('id_client', $clientIds)
            ->where('id_type', 3)
            ->where('operateur_destinataire_id IS NULL')
            ->get()
            ->getRow()
            ->total ?? 0;

        $autres = $this->db->table('Transaction')
            ->selectSum('frais', 'total')
            ->where('operateur_destinataire_id IS NOT NULL')
            ->get()
            ->getRow()
            ->total ?? 0;

        return compact('retrait', 'interne', 'autres');
    }

    public function getMontantsAPayer($operateur_id)
    {
        $clientIds = $this->getClientIdsByOperateur($operateur_id);
        if (empty($clientIds)) return [];

        $builder = $this->db->table('Transaction t');
        $builder->select('o.id, o.nom, SUM(t.commission_inter_operateur) AS total');
        $builder->join('Operateur o', 't.operateur_destinataire_id = o.id');
        $builder->where('t.commission_inter_operateur >', 0);
        $builder->whereIn('t.id_client', $clientIds);
        $builder->where('t.operateur_destinataire_id IS NOT NULL');
        $builder->where('t.operateur_destinataire_id !=', $operateur_id);
        $builder->groupBy('o.id, o.nom');
        return $builder->get()->getResult();
    }

    public function getMontantsARecevoir($operateur_id)
    {
        $builder = $this->db->table('Transaction t');
        $builder->select('o.id, o.nom, SUM(t.commission_inter_operateur) AS total');
        $builder->join('Operateur o', 't.operateur_destinataire_id = o.id');
        $builder->where('t.operateur_destinataire_id', $operateur_id);
        $builder->groupBy('o.id, o.nom');
        return $builder->get()->getResult();
    }

    public function getMontantsAEnvoyer($operateur_id)
    {
        $clientIds = $this->getClientIdsByOperateur($operateur_id);
        if (empty($clientIds)) return [];

        $builder = $this->db->table('Transaction t');
        $builder->select('o.id, o.nom, SUM(t.montant + t.commission_inter_operateur) AS total');
        $builder->join('Operateur o', 't.operateur_destinataire_id = o.id');
        $builder->whereIn('t.id_client', $clientIds);
        $builder->where('t.operateur_destinataire_id IS NOT NULL');
        $builder->where('t.operateur_destinataire_id !=', $operateur_id);
        $builder->groupBy('o.id, o.nom');
        return $builder->get()->getResult();
    }
}
