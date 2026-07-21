<?php

namespace App\Controllers;

use App\Models\ClientModel;
use App\Models\PrefixeOperateurModel;

class AuthController extends BaseController
{
    // public function form()
    // {
    //     return view('Modal', ['page' => 'auth/Login']);
    // }

    public function login()
    {
        $model = new ClientModel();
        $prefixeModel = new PrefixeOperateurModel();

        $telephone = (string) $this->request->getPost('telephone');
        $prefixeTelephone = substr($telephone, 0, 3);
        $prefixesValides = [];

        foreach ($prefixeModel->getPrefixes() as $prefixe) {
            $prefixesValides[] = $prefixe->Prefix;
        }

        if (! in_array($prefixeTelephone, $prefixesValides, true)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Le numéro doit commencer par un préfixe valide.');
        }

        $user = $model->getClientByNumero($telephone);
        if (! $user) {
            $id = $model->insert(['numero' => $telephone]);
            session()->set('user',[
                'id' => $id,
                'numero' => $telephone,
            ]);
            return redirect()->to('/index')->with('success','Utilisateur cree');
        }

        session()->set('user', [
            'id'    => $user->id,
            'numero'  => $user->numero,
        ]);

        return redirect()->to('/index');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}