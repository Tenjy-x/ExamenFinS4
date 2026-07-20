<?php

namespace App\Controllers;
use App\Models\ClientModel;
use App\Models\TransactionModel;
class ClientController extends BaseController
{
    public function index(): string
    {
        return view('clients/Tableau_Bord');
    }
}