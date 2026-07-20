<?php

namespace App\Controllers;

use App\Models\ClientModel;

class AuthController extends BaseController
{
    // public function form()
    // {
    //     return view('Modal', ['page' => 'auth/Login']);
    // }

    public function login()
    {
        $model = new ClientModel();

        $telephone = (string) $this->request->getPost('telephone');
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