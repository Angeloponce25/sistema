<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    //
    public function cliente(){ //un cliente puede tener varios pagos
        return $this->belongsTo(Cliente::class); //Pertenece a un Cliente.
    }
    public function usuario(){ //un cliente puede tener varios pagos
        return $this->belongsTo(User::class); //Pertenece a un Cliente.
    }
    public function mensualidad(){ //un cliente puede tener varios pagos
        return $this->belongsTo(Mensualidad::class); //Pertenece a un Cliente.
    }
}
