<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model {
    protected $table = 'Client';
    protected $primarykey = 'id';
    protected $allowedFields = ['numero'];
    protected $returnType = 'object';
    
    public function getClientByNumero ($numero){
        return $this->where('numero', $numero)->first();
    }
}