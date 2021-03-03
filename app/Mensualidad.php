<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensualidad extends Model
{
    public function cliente(){ //un cliente puede tener varios pagos
        return $this->belongsTo(Cliente::class); //Pertenece a un Cliente.
    }
}
