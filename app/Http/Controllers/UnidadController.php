<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Unidad\Update;

use App\UnidadPrivativa;
Use App\Condominio;
Use App\TipoUnidadesPrivativas;

class UnidadController extends Controller
{
    //
    public function index(){
        //$condominios = ->get()->unidades;
        $condominios = Auth::user()->condominios()->with('unidades')->get();
        return view('app.admin.unidad.index')->with('condominios',$condominios);
    }

    public function edit($id){
        $unidad = UnidadPrivativa::find($id);
        if(Auth::user()->isAdmin())
        return view('app.admin.unidad.edit')->with('unidad',$unidad);
        dd($unidad);
    }

    public function update(Update $request,$id){

        $unidad = UnidadPrivativa::find($id);
        $unidad->numero=$request->numero;
        $unidad->numero_cajones = $request->numero_cajones;
        $unidad->notas = $request->notas;
        $unidad->tipo_unidad()->dissociate();
        $tup = TipoUnidadesPrivativas::find($request->tup);
        $unidad->tipo_unidad()->associate($tup);
        if($unidad->save())
        return redirect()->route('unidad.index')->with('success', 'Unidad actualizada satisfactoriamente');

        return redirect()->route('unidad.index')->with('error', 'Ocurrió un problema, intente nuevamente.');
    }
}
