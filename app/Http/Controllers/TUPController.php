<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


use App\Http\Requests\TUP\Store;
use App\Http\Requests\TUP\Update;
use App\Http\Requests\TUP\CondoAjax;

use App\TipoUnidadesPrivativas;
use App\Condominio;

class TUPController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        
        $condominios = Auth::user()->condominios()->get();
        return view('app.admin.tup.index')->with('condominios', $condominios);

    }

    public function edit($id){
        $tup = TipoUnidadesPrivativas::find($id);
        return view('app.admin.tup.edit')->with('tup',$tup);
    }

    public function create(){
        $condominios = Auth::user()->condominios()->get();
        return view('app.admin.tup.create')->with('condominios', $condominios);
    }

    public function store(Store $request){
        $tup = new TipoUnidadesPrivativas;
        $tup->nombre= $request->nombre;
        $tup->descripcion = $request->descripcion;
        $condominio = Condominio::find($request->condominio);
        $tup->condominio()->associate($condominio);
        if($tup->save()) return redirect()->route('tipo_unidad.index')->with('success','Tipo de Unidad Privativa creada satisfactoriamente');
        return redirect()->route('tipo_unidad.index')->with('error','Existe un error inesperado, intente de nuevo');

    }

    public function update(Update $request, $id){
        $tup = TipoUnidadesPrivativas::find($id);

        if($request->nombre !=''){
            $tup->nombre=$request->nombre;
        }

        if($request->descripcion != ''){
            $tup->descripcion = $request->descripcion;
        }
 
        if($tup->save()) return redirect()->route('tipo_unidad.index')->with('success','Tipo de Unidad Privativa actializada satisfactoriamente');
        return redirect()->route('tipo_unidad.index')->with('error','Existe un error inesperado, intente de nuevo');
    }

    public function destroy($id){
        $tup = TipoUnidadesPrivativas::where('id',$id)->withCount('unidades')->first();
        if($tup->unidades_count >0) return redirect()->route('tipo_unidad.index')->with('error','Existen Unidades Privativas con este Tipo de Unidad');
        $tup->delete();
        return redirect()->route('tipo_unidad.index')->with('success','Tipo de Unidad Privativa eliminada satisfactoriamente');
    }


    public function ajaxCondo (CondoAjax $request){
        $condominio = Condominio::find($request->id);
        $tups = $condominio->tipo_unidades;
        return response()->json($tups->toJson());
    }
}
