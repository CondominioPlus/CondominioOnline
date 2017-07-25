<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidadesPrivativas extends Model
{
    //
    protected $table = 'tipo_unidades';

    public function condominio(){
        return $this->belongsTo('App\Condominio');
    }

    public function unidades(){
        return $this->hasMany('App\UnidadPrivativa');
    }
}
