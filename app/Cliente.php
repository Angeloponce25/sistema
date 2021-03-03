<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function pago(){ //un cliente puede tener varios pagos
        return $this->belongsTo(Pago::class); //Pertenece a un Cliente.
    }
}
