<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TUP\Inicio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\TipoUnidadesPrivativas;

class TUPController extends Controller
{
    //
    public function inicioStore(Inicio $request){
        dd($request);
    }

    public function index(){
        
        $condominios = Auth::user()->condominios()->get();
        return view('app.admin.tup.index')->with('condominios', $condominios);

    }

    public function edit($id){
        $tup = TipoUnidadesPrivativas::find($id);
        return view('app.admin.tup.edit')->with('tup',$tup);
    }
}
