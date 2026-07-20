<?php

namespace App\Controllers;

use App\Models\OperateurModel;
use App\Models\PrefixeOperateurModel;
use App\Models\TypeTransactionModel;
use App\Models\TrancheModel;
use App\Models\TransactionModel;
use App\Models\ClientModel;

use CodeIgniter\HTTP\ResponseInterface;

class OperateurController extends BaseController {
    public function login() {
        $prefixeOperateurModel = new PrefixeOperateurModel();
        $prefixe = $prefixeOperateurModel->getAllPrefix();
        return view('Login_Operateur', ['prefixe' => $prefixe]);
    }

    public function authentification(){
        $session = session();
        $prefixeOperateurModel = new PrefixeOperateurModel();
        $prefixe = $prefixeOperateurModel->getAllPrefix();

        $id_prefix = $this->request->getPost('id_prefix');
        $mot_de_passe = $this->request->getPost('mot_de_passe');

        $operateurModel = new OperateurModel();
        $operateur = $operateurModel->getOperateurByprefixAndPassword($id_prefix, $mot_de_passe);

        if ($operateur) {
            $session->set('operateur', $operateur);
            return redirect()->to('/admin');
        }
        return view('Login_Operateur', ['error' => 'Mot de passe incorrect', 'prefixe' => $prefixe]);
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/login_Operateur');
    }

    public function index() {
        $session = session();
        $operateur = $session->get('operateur');
        if (!$operateur) return redirect()->to('/login_Operateur');

        $prefixeOperateurModel = new PrefixeOperateurModel();
        $transactionModel = new TransactionModel();
        $clientModel = new ClientModel();

        $prefixe = $prefixeOperateurModel->getAllPrefix();
        $gains = $transactionModel->getGainsByType();
        $totalGains = 0;
        foreach ($gains as $g) $totalGains += $g->total_gains;

        $clients = $clientModel->findAll();
        $clientCount = count($clients);

        $transactionCount = $transactionModel->getCount();
        $recentTransactions = $transactionModel->getRecentTransactions(4);

        return view('admin/Index', [
            'operateur' => $operateur,
            'prefixe' => $prefixe,
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

        $clients = $clientModel->findAll();
        $count = count($clients);

        foreach ($clients as $c) {
            $c->solde = $transactionModel->getSolde($c->id);
        }

        return view('admin/Gestion_Client', ['clients' => $clients, 'count' => $count]);
    }

    public function gestionFrais() {
        $session = session();
        if (!$session->get('operateur')) return redirect()->to('/login_Operateur');

        $typeModel = new TypeTransactionModel();
        $trancheModel = new TrancheModel();
        $prefixeModel = new PrefixeOperateurModel();
        $transactionModel = new TransactionModel();

        $types = $typeModel->findAll();
        $prefixes = $prefixeModel->findAll();
        $gains = $transactionModel->getGainsByType();

        $totalGains = 0;
        foreach ($gains as $g) $totalGains += $g->total_gains;

        $tranches = [];
        foreach ($types as $t) {
            $tranches[$t->id] = $trancheModel->getTrancheByType($t->id);
        }

        return view('admin/Gestion_Frais', [
            'types' => $types,
            'prefixe' => $prefixes,
            'gains' => $gains,
            'tranches' => $tranches,
            'totalGains' => $totalGains
        ]);
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