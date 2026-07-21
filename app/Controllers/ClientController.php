<?php

namespace App\Controllers;
use App\Models\ClientModel;
use App\Models\TransactionModel;
use App\Models\EpargneModel;
class ClientController extends BaseController
{
    public function index(): string
    {
        $transaction = new TransactionModel();
        $user = session()->get('user');

        $solde = $transaction->getSolde($user['id']);
        return view('clients/Tableau_Bord' , [
            'user' => $user,
            'solde' => $solde,
        ]);
    }

    public function depot() {
        $user = session()->get('user');
        $transaction = new TransactionModel();

        $solde = $transaction->getSolde($user['id']);

        return view('clients/Depot' , [
            'user'=> $user,
            'solde' => $solde,
        ]);
    }

    public function retrait() {
        $transaction = new TransactionModel();

        $user = session()->get('user');
        $solde = $transaction->getSolde($user['id']);

        return view('clients/Retrait', [
            'user' => $user,
            'solde' => $solde,
        ]);
    }

    public function transfert() {
        $user = session()->get('user');
        $transaction = new TransactionModel();

        $solde = $transaction->getSolde($user['id']);

        return view('clients/Transfert', [
            'user'=> $user,
            'solde' => $solde,
        ]);
    }

    public function historique() {
        $user = session()->get('user');
        $transaction = new TransactionModel();

        $historique = $transaction->getHistoriqueByClient($user['id']);
        $solde = $transaction->getSolde($user['id']);

        return view('clients/Historique', [
            'user' => $user,
            'solde' => $solde,
            'historique' => $historique,
        ]);
    }

    public function Epargne(){
        $user = session()->get('user');
        $EpargneModel = new EpargneModel();

    
        $epargne = $EpargneModel->getByClient($user['id']);

        return view('clients/Epargne', [
            'user' => $user,
            'epargne' => $epargne,
        ]);
    }
}