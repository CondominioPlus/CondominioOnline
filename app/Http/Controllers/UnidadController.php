<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\Unidad\Store;
use App\Http\Requests\Unidad\Update;

use App\UnidadPrivativa;
Use App\Condominio;
Use App\TipoUnidadesPrivativas;

class UnidadController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
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
    }

    public function create(){
        $condominios = Auth::user()->condominios()->get();

        return view('app.admin.unidad.create')->with('condominios', $condominios);
    }



    public function update(Update $request,$id){

        $unidad = UnidadPrivativa::find($id);
        $unidad->numero=$request->numero;
        $unidad->numero_cajones = $request->numero_cajones;
        $unidad->notas = $request->notas;
        $unidad->tipo_unidad()->dissociate();
        $tup = TipoUnidadesPrivativas::find($request->tup);
        $unidad->tipo_unidad()->associate($tup);
        if($unidad->save()) return redirect()->route('unidad.index')->with('success', 'Unidad actualizada satisfactoriamente');
        return redirect()->route('unidad.index')->with('error', 'Ocurrió un problema, intente nuevamente.');
    }


    public function destroy($id){
        $unidad = UnidadPrivativa::find($id);
        $unidad->owners()->detach();
        if($unidad->delete()) return redirect()->route('unidad.index')->with('success', 'Unidad eliminada satisfactoriamente');
        return redirect()->route('unidad.index')->with('error', 'Ocurrió un problema, intente nuevamente.');

    }

    public function store(Store $request){
        $unidad = new UnidadPrivativa;

        $unidad->numero = $request->numero;
        $unidad->numero_cajones = $request->numero_cajones;
        $unidad->notas = $request->notas;
        $unidad->condominio_id = $request->condominio;
        $unidad->tipo_unidades_privativas_id = $request->tup;

        if($unidad->save()) return redirect()->route('unidad.index')->with('success', 'Unidad creada satisfactoriamente');
        return redirect()->route('unidad.index')->with('error', 'Ocurrió un problema, intente nuevamente.');

    }
}
