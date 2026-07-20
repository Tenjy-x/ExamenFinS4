<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('Login_Client');
    }

    public function operateur(): string
    {
        return view('Login_Operateur');
    }
}
