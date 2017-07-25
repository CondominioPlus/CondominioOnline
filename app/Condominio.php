<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tipo_unidades(){
        return $this->hasMany('App\TipoUnidadesPrivativas');
    }

    public function unidades(){
        return $this->hasMany('App\UnidadPrivativa');
    }
}
