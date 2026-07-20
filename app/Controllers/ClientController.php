<?php

namespace App\Controllers;
use App\Models\ClientModel;
use App\Models\TransactionModel;
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

        return view('clients/Depot' , [
            'user'=> $user
        ]);
    }

    public function retrait() {
        $user = session()->get('user');

        return view('clients/Retrait', [
            'user' => $user
        ] );
    }

    public function transfert() {
        $user = session()->get('user');

        return view('clients/Transfert', [
            'user'=> $user
        ]);
    }
}