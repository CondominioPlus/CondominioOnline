<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadPrivativa extends Model
{
    //
    protected $table = 'unidades';

    public function condominio(){
        return $this->belongsTo('App\Condominio');
    }

    public function tipo_unidad(){
        return $this->belongsTo('App\TipoUnidadesPrivativas');
    }
}
