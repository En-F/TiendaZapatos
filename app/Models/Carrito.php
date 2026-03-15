<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $fillable = [
        'usuario_id',
        'zapato_id',
        'cantidad'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function zapato(){
        return $this->belongsTo(Zapato::class);
    }
}
