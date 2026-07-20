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
        $prefixes = $this->db->table('Prefix_operateur p')
            ->select('p.Prefix')
            ->join('Operateur_prefix op', 'op.prefix_id = p.id')
            ->where('op.operateur_id', $operateur_id)
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

    public function getGainsByOperateur($operateur_id, $type = 'propre')
    {
        if ($type === 'propre') {
            $clientIds = $this->getClientIdsByOperateur($operateur_id);
            if (empty($clientIds)) return [];

            $this->db->table('Transaction t');
            $builder = $this->db->table('Transaction t');
            $builder->select('tt.libelle, SUM(t.frais) AS total_gains, COUNT(*) AS nb_transactions');
            $builder->join('Type_transaction tt', 't.id_type = tt.id');
            $builder->whereIn('t.id_client', $clientIds);
            $builder->groupStart();
            $builder->where('t.operateur_destinataire_id IS NULL');
            $builder->orWhere('t.operateur_destinataire_id', $operateur_id);
            $builder->groupEnd();
            $builder->groupBy('tt.libelle');
            return $builder->get()->getResult();
        }

        $builder = $this->db->table('Transaction t');
        $builder->select('tt.libelle, SUM(t.commission_inter_operateur) AS total_gains, COUNT(*) AS nb_transactions');
        $builder->join('Type_transaction tt', 't.id_type = tt.id');
        $builder->where('t.operateur_destinataire_id', $operateur_id);
        $builder->groupBy('tt.libelle');
        return $builder->get()->getResult();
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
}
