<?php

namespace App\Models;
use App\Models\Zapato;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    protected $fillable = ['factura_id','zapato_id','cantidad'];

    public function zapato(){
        return $this->belongsTo(Zapato::class);
    }

    public function factura(){
        return $this->belongsTo(Factura::class);
    }
}
