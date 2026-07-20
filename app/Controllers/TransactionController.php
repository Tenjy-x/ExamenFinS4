<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\TrancheModel;
use App\Models\ClientModel;
use App\Models\OperateurModel;
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

        if (!$montant || $montant <= 0) {
            return redirect()->back()->with('error', 'Montant invalide');
        }

        $transaction = new TransactionModel();
        $solde = $transaction->getSolde($user['id']);

        if ($montant > $solde) {
            return redirect()->back()->with('error', 'Solde insuffisant. Votre solde disponible est de ' . $solde . ' Ar.');
        }

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
        $numeros = $this->request->getVar('numero');
        $inclureFrais = $this->request->getVar('include_fee') === '1';

        // Normalise: accepte un seul string ou un tableau
        if (!is_array($numeros)) {
            $numeros = [$numeros];
        }
        // Supprime les entrées vides
        $numeros = array_values(array_filter($numeros, fn($n) => $n !== null && $n !== ''));

        if (!$montant || empty($numeros)) {
            return redirect()->back()->with('error', 'Montant ou numéro invalide');
        }

        $operateurModel = new OperateurModel();
        $opExpediteur   = $operateurModel->getOperateurByPrefix(substr($user['numero'], 0, 3));

        // Résoudre tous les bénéficiaires et valider (même opérateur)
        $beneficiaires = [];
        foreach ($numeros as $numero) {
            $client2 = $Clients->getClientByNumero($numero);
            if (!$client2) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Aucun compte trouvé pour le numéro « ' . htmlspecialchars($numero, ENT_QUOTES, 'UTF-8') . ' ».');
            }
            $opBenef = $operateurModel->getOperateurByPrefix(substr($client2->numero, 0, 3));
            if ($opExpediteur === null || $opBenef !== $opExpediteur) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Le numéro « ' . htmlspecialchars($numero, ENT_QUOTES, 'UTF-8') . ' » n\'appartient pas au même opérateur.');
            }
            $beneficiaires[] = $client2;
        }

        $transaction  = new TransactionModel();
        $trancheModel = new TrancheModel();

        $solde = $transaction->getSolde($user['id']);
        if ($montant > $solde) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Solde insuffisant. Votre solde disponible est de ' . $solde . ' Ar.');
        }

        $nb           = count($beneficiaires);
        $montantPart  = intval($montant / $nb); // divisé équitablement

        foreach ($beneficiaires as $client2) {
            $tranche = $trancheModel->findTranche(3, $montantPart);

            if ($inclureFrais) {
                // Même opérateur déjà validé — on applique les frais de retrait
                $trancheRetrait = $trancheModel->findTranche(2, $montantPart);
                $fraisRetrait   = $trancheRetrait->Frais ?? 0;
                $montantNet     = $montantPart - $fraisRetrait;
            } else {
                $fraisRetrait = $tranche->Frais ?? 0;
                $montantNet   = $montantPart;
            }

            $transaction->insert([
                'id_type'    => 3,
                'id_tranche' => $tranche->id ?? 1,
                'montant'    => $montantNet,
                'frais'      => $fraisRetrait,
                'id_client'  => $user['id'],
                'id_client2' => $client2->id,
            ]);
        }

        return redirect()->to('/index');
    }
}