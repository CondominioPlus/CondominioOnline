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
        return $this->belongsTo('App\TipoUnidadesPrivativas','tipo_unidades_privativas_id');
    }

    public function owners(){
        return $this->belongsToMany('App\User','user_unidad','unidades_id','user_id')->withPivot('contacto');
    }

}
