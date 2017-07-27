<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\TUP\Inicio;
use App\Http\Requests\TUP\Update;

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

    public function update(Update $request, $id){
        $tup = TipoUnidadesPrivativas::find($id);

        if($request->nombre !=''){
            $tup->nombre=$request->nombre;
        }

        if($request->descripcion != ''){
            $tup->descripcion = $request->descripcion;
        }
 
        $tup->save();

        return redirect()->route('tipo_unidad.index');
    }
}
