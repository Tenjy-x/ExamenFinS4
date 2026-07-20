<?php

namespace App\Models;

use CodeIgniter\Models;

class ClientModel extends Model {
    protected $table = 'Client';
    protected $primarykey = 'id';
    protected $allowedFields = ['nom', 'numero'];
    
    public function getClientByNumero ($numero){
        return $this->where('numero', $numero)->first();
    }
}