<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TUP\Inicio;

class TUPController extends Controller
{
    //
    public function inicioStore(Inicio $request){
        dd($request);
    }
}
