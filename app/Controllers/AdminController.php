<?php

namespace App\Controllers;
use App\Models\ClientModel;
use App\Models\TransactionModel;
class AdminController extends BaseController
{
    public function index() {
        return view("admin/Gestion_Client");
    }
}