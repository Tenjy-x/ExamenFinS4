<?php

namespace App\Controllers;
use App\Models\TransactionModel;
use App\Models\TrancheModel;
use App\Models\ClientModel;
class TransactionController extends BaseController
{
    public function traiter_depot() {
        $user = session()->get('user');
        $transaction = new TransactionModel();
        $montant = $this->request->getVar('amount');

        if (!$montant) {
            return redirect()->back()->with('error', 'Montant invalide');
        }

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

        if (!$montant) {
            return redirect()->back()->with('error', 'Montant invalide');
        }

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
        $Clients = new ClientModel();
        $montant = $this->request->getVar('amount');
        $numero = $this->request->getVar('numero');
        $inclureFrais = $this->request->getVar('include_fee') === '1';

        if (!$montant || !$numero) {
            return redirect()->back()->with('error', 'Montant ou numéro invalide');
        }

        $client2 = $Clients->getClientByNumero($numero);
        if (!$client2) {
            return redirect()->back()->with('error', 'Bénéficiaire introuvable');
        }

        $transaction = new TransactionModel();
        $trancheModel = new TrancheModel();
        $tranche = $trancheModel->findTranche(3, $montant);

        if ($inclureFrais) {
        
            $memeOperateur = substr($user['numero'], 0, 3) === substr($client2->numero, 0, 3);
            $fraisRetrait  = 0;
            if ($memeOperateur) {
                $trancheRetrait = $trancheModel->findTranche(2, $montant);
                $fraisRetrait   = $trancheRetrait->Frais ?? 0;
            }

            $montantNet = $montant - $fraisRetrait;
        } else {
            $fraisRetrait = $tranche->Frais ?? 0;
            $montantNet   = $montant;
        }

        $transaction->insert([
            'id_type'    => 3,
            'id_tranche' => $tranche->id ?? 1,
            'montant'    => $montantNet,
            'frais'      => $fraisRetrait,
            'id_client'  => $user['id'],
            'id_client2' => $client2->id,
        ]);
        return redirect()->to('/index');
    }
}