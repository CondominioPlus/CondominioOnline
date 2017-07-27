<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password','apellidos','telefono',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol(){
        return $this->belongsTo('App\Rol');
    }

    public function condominios(){
        return $this->hasMany('App\Condominio');
    }

    public function unidadesCompletas(){
        return $this->hasManyThrough('App\UnidadPrivativa', 'App\Condominio');
    }

    public function unidades(){
        return $this->belongsToMany('App\UnidadPrivativa','user_unidad','user_id','unidades_id')->withPivot('contacto');
    }


    public function isAdmin(){
        return $this->rol->id === 1;
    }
    public function isCondo(){
        return $this->rol->id === 2;
    }

}
