<?php

namespace App\Controllers;

use App\Models\OperateurModel;
use App\Models\PrefixeOperateurModel;
use App\Models\TypeTransactionModel;
use App\Models\TrancheModel;
use App\Models\TransactionModel;
use App\Models\ClientModel;
use App\Models\CommissionInterOperateurModel;

use CodeIgniter\HTTP\ResponseInterface;

class OperateurController extends BaseController {
    public function login() {
        return view('Login_Operateur');
    }

    public function authentification(){
        $session = session();

        $nom = $this->request->getPost('nom');
        $mot_de_passe = $this->request->getPost('mot_de_passe');

        $operateurModel = new OperateurModel();
        $operateur = $operateurModel->getOperateurByNomAndPassword($nom, $mot_de_passe);

        if ($operateur) {
            $prefixes = $operateurModel->getPrefixesByOperateur($operateur->id);
            $session->set('operateur', $operateur);
            $session->set('operateur_prefixes', $prefixes);
            return redirect()->to('/admin');
        }
        return view('Login_Operateur', ['error' => 'Nom ou mot de passe incorrect']);
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login_Operateur');
    }

    private function getPrefixNumbers() {
        $prefixes = session()->get('operateur_prefixes');
        if (!$prefixes) return [];
        return array_map(function($p) { return $p->Prefix; }, $prefixes);
    }

    public function index() {
        $session = session();
        $operateur = $session->get('operateur');
        if (!$operateur) return redirect()->to('/login_Operateur');

        $transactionModel = new TransactionModel();
        $clientModel = new ClientModel();

        $prefixNumbers = $this->getPrefixNumbers();

        $gains = $transactionModel->getGainsByType();
        $totalGains = 0;
        foreach ($gains as $g) $totalGains += $g->total_gains;

        $clients = $clientModel->whereIn('SUBSTR(numero, 1, 3)', $prefixNumbers)->findAll();
        $clientCount = count($clients);

        $transactionCount = $transactionModel->getCount();
        $recentTransactions = $transactionModel->getRecentTransactions(4);

        return view('admin/Index', [
            'operateur' => $operateur,
            'gains' => $gains,
            'totalGains' => $totalGains,
            'clientCount' => $clientCount,
            'transactionCount' => $transactionCount,
            'recentTransactions' => $recentTransactions
        ]);
    }

    public function gestionClients (){
        $session = session();
        if (!$session->get('operateur')) return redirect()->to('/login_Operateur');

        $clientModel = new ClientModel();
        $transactionModel = new TransactionModel();

        $prefixNumbers = $this->getPrefixNumbers();

        $clients = $clientModel->whereIn('SUBSTR(numero, 1, 3)', $prefixNumbers)->findAll();
        $count = count($clients);

        foreach ($clients as $c) {
            $c->solde = $transactionModel->getSolde($c->id);
        }

        return view('admin/Gestion_Client', ['clients' => $clients, 'count' => $count]);
    }

    public function gestionFrais() {
        $session = session();
        if (!$session->get('operateur')) return redirect()->to('/login_Operateur');

        $operateurSession = $session->get('operateur');
        $operateurModel = new OperateurModel();
        $typeModel = new TypeTransactionModel();
        $trancheModel = new TrancheModel();
        $prefixeModel = new PrefixeOperateurModel();
        $transactionModel = new TransactionModel();
        $commissionModel = new CommissionInterOperateurModel();

        $types = $typeModel->findAll();
        $prefixes = $prefixeModel->findAll();
        $gains = $transactionModel->getGainsByType();
        $operateurs = $operateurModel->getAllOperateurs();
        $commissions = $commissionModel->getAll();

        $totalGains = 0;
        foreach ($gains as $g) $totalGains += $g->total_gains;

        $tranches = [];
        foreach ($types as $t) {
            $tranches[$t->id] = $trancheModel->getTrancheByType($t->id);
        }

        $gainsPropres = $transactionModel->getGainsByOperateur($operateurSession->id, 'propre');
        $gainsInter = $transactionModel->getGainsByOperateur($operateurSession->id, 'inter');

        $montantsAPayer = $transactionModel->getMontantsAPayer($operateurSession->id);
        $montantsARecevoir = $transactionModel->getMontantsARecevoir($operateurSession->id);

        return view('admin/Gestion_Frais', [
            'types'       => $types,
            'prefixe'     => $prefixes,
            'gains'       => $gains,
            'tranches'    => $tranches,
            'totalGains'  => $totalGains,
            'operateurs'  => $operateurs,
            'commissions' => $commissions,
            'gainsPropres' => $gainsPropres,
            'gainsInter'   => $gainsInter,
            'montantsAPayer'   => $montantsAPayer,
            'montantsARecevoir' => $montantsARecevoir,
        ]);
    }

    public function saveCommission() {
        $session = session();
        if (!$session->get('operateur')) {
            return $this->response->setJSON(['success' => false]);
        }

        $json = $this->request->getJSON();
        $commissionModel = new CommissionInterOperateurModel();

        $data = [
            'operateur_emetteur_id'     => (int) $json->emetteur_id,
            'operateur_destinataire_id' => (int) $json->destinataire_id,
            'commission_pourcentage'    => (float) $json->pourcentage,
        ];

        $existing = $commissionModel->where('operateur_emetteur_id', $data['operateur_emetteur_id'])
            ->where('operateur_destinataire_id', $data['operateur_destinataire_id'])
            ->first();

        if ($existing) {
            $commissionModel->update($existing->id, $data);
        } else {
            $commissionModel->insert($data);
        }

        return $this->response->setJSON(['success' => true]);
    }

    public function updateTranche() {
        $session = session();
        if (!$session->get('operateur')) return $this->response->setJSON(['success' => false, 'error' => 'Non autorisé']);

        $json = $this->request->getJSON();
        $trancheModel = new TrancheModel();

        $data = [
            'montant_min' => (float) $json->montant_min,
            'montant_max' => (float) $json->montant_max,
            'Frais'       => (float) $json->Frais,
        ];

        $trancheModel->update($json->id, $data);

        return $this->response->setJSON(['success' => true]);
    }
}
