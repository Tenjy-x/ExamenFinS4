<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\TrancheModel;
use App\Models\ClientModel;
use App\Models\OperateurModel;
use App\Models\CommissionInterOperateurModel;

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

        if (!$montant || !$numero) {
            return redirect()->back()->with('error', 'Montant ou numéro invalide');
        }

        $client2 = $Clients->getClientByNumero($numero);
        if (!$client2) {
            return redirect()->back()->with('error', 'Bénéficiaire introuvable');
        }

        $transaction = new TransactionModel();
        $trancheModel = new TrancheModel();
        $clientModel = new ClientModel();
        $operateurModel = new OperateurModel();
        $commissionModel = new CommissionInterOperateurModel();

        $tranche = $trancheModel->findTranche(3, $montant);
        $frais = $tranche->Frais ?? 0;
        $commission_inter = 0;
        $operateur_destinataire_id = null;

        $clientEmetteur = $clientModel->find($user['id']);
        $prefixEmetteur = substr($clientEmetteur->numero, 0, 3);
        $operateurEmetteur = $operateurModel->getOperateurByPrefix($prefixEmetteur);

        $clientDestinataire = $clientModel->find($client2->id);
        if ($clientDestinataire) {
            $prefixDestinataire = substr($clientDestinataire->numero, 0, 3);
            $operateurDestinataire = $operateurModel->getOperateurByPrefix($prefixDestinataire);

            if ($operateurEmetteur && $operateurDestinataire && $operateurEmetteur->id != $operateurDestinataire->id) {
                $commission = $commissionModel->getCommission($operateurEmetteur->id, $operateurDestinataire->id);
                if ($commission) {
                    $commission_inter = $montant * $commission->commission_pourcentage / 100;
                    $operateur_destinataire_id = $operateurDestinataire->id;
                }
            }
        }

        $transaction->insert([
            'id_type'    => 3,
            'id_tranche' => $tranche->id ?? 1,
            'montant'    => $montant,
            'frais'      => $frais,
            'id_client'  => $user['id'],
            'id_client2' => $client2->id,
            'commission_inter_operateur' => $commission_inter,
            'operateur_destinataire_id'  => $operateur_destinataire_id,
        ]);

        return redirect()->to('/index');
    }
}