<?php

namespace App\Controllers;
use App\Models\TransactionModel;
use App\Models\TrancheModel;
class TransactionController extends BaseController
{
    public function traiter_depot() {
        $user = session()->get('user');
        $transaction = new TransactionModel();
        $montant = $this->request->getVar('amount');
        $transaction->insert([
            'id_type'    => 1,
            'id_tranche' => 1,
            'montant'    => $montant,
            'frais'      => 0,
            'id_client'  => $user['id'],
        ]);
        return redirect()->to('/index');
    }

    public function traiter_retrait() {
        $user = session()->get('user');
        $montant = $this->request->getVar('amount');
        $transaction = new TransactionModel();
        $trancheModel = new TrancheModel();
        $tranche = $trancheModel->findTranche(2, $montant);

        $transaction->insert([
            'id_type'    => 2,
            'id_tranche' => $tranche->id ?? 1,
            'montant'    => $montant,
            'frais'      => $tranche->Frais ?? 0,
            'id_client'  => $user['id'],
        ]);
        return redirect()->to('/index');
    }

    public function traiter_transfert() {
        $user = session()->get('user');
        $montant = $this->request->getVar('amount');
        $id_client2 = $this->request->getVar('id_client2');
        $transaction = new TransactionModel();
        $trancheModel = new TrancheModel();
        $tranche = $trancheModel->findTranche(3, $montant);

        $transaction->insert([
            'id_type'    => 3,
            'id_tranche' => $tranche->id ?? 1,
            'montant'    => $montant,
            'frais'      => $tranche->Frais ?? 0,
            'id_client'  => $user['id'],
            'id_client2' => $id_client2,
        ]);
        return redirect()->to('/index');
    }
}