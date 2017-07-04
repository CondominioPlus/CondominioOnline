<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Condominios\Inicio;


class CondominioController extends Controller
{
    //
    public function inicioStore(Inicio $request){
        dd($request);
    }
}
