<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Condominios\Store;
use App\Http\Requests\Condominios\Update;


Use App\Condominio;
Use App\User;
Use App\TipoUnidadesPrivativas;
Use App\UnidadPrivativa;

class CondominioController extends Controller
{
    //
    public function __construct() 
    {
        $this->middleware('auth');
    }
    

    public function index(){
        $condominios = Auth::user()->condominios()->paginate(10);
        //dd($data);
        return view('app.admin.condominio.index')->with('condominios', $condominios);
    }

 
    public function create(){
        return view('app.admin.condominio.create');
    }

    public function store(Store $request){
        //obtiene los request 
        $unidades = $request->nombre_unidad;
        $numero_unidades = $request->numero_unidad;

        //crea el nuevo condominio
        $condominio = new Condominio;
        $condominio->nombre = $request->nombre;
        $condominio->direccion = $request->direccion;
        $imgpath=Storage::putFile('public/logos',$request->file('logo'));
        $condominio->url_img = Storage::url($imgpath);
        $condominio->user_id = Auth::user()->id;
        $condominio->save();
        //Auth::user()->condominios()->associate($condominio);
        
        for($j=0;$j<count($unidades); $j++){
            $aux = new TipoUnidadesPrivativas;
            $aux->nombre = $unidades[$j];
            $aux->condominio()->associate($condominio);
            $aux->save();
            
            for($i=1; $i<$numero_unidades[$j]+1;$i++ ){
                $up = new UnidadPrivativa;
                $up->numero = $i;
                $up->rentado = 0;
                $up->tipo_unidad()->associate($aux);
                $up->condominio_id = $condominio->id;
                $up->save();
                
            }
        }
        return redirect()->route('condominio.index')
                        ->with('success', 'Condominio creado satisfactoriamente');
    }

 
    public function show($condo){
        $condominio = Condominio::find($condo);
        //dd($condominio->unidades);
        if(Auth::user()->isAdmin())
        return view('app.admin.condominio.show')->with('condominio', $condominio);
    }

  
    public function edit($condo){
        $condominio = Condominio::find($condo);
        if(Auth::user()->isAdmin())
        return view('app.admin.condominio.edit')->with('condominio', $condominio);
    }


    public function update(Update $request, $condo){
        $condominio = Condominio::find($condo);
        //dd($condo);

        if($request->nombre!=''){
            $condominio->nombre = $request->nombre;
        }

        if($request->direccion!=''){
            $condominio->direccion = $request->direccion;
        }

        if($request->file('logo')!= null){
            $imgpath=Storage::putFile('public/logos',$request->file('logo'));
            $condominio->url_img = Storage::url($imgpath);
        }

        $condominio->save();

        return redirect()->route('condominio.index')
                        ->with('success', 'Condominio actualizado satisfactoriamente');
    }


    public function destroy($condo){

        $condominio = Condominio::find($condo);
                
        
        $tups=$condominio->tipo_unidades()->get();
        $unidades = $condominio->unidades()->get();
        foreach($unidades as $unidad){
            $unidad->delete();
        }
        foreach($tups as $tup){
            $tup->delete();
        }

        
        Storage::delete($condominio->url_img);
        $condominio->delete();
        
        return redirect()->route('condominio.index')
                        ->with('success', 'Condominio eliminado satisfactoriamente');
    }
}
