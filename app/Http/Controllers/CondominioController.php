<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\Condominios\Store;
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $condominios = Auth::user()->condominios()->paginate(10);
        //dd($data);
        return view('app.admin.condominio.index')->with('condominios', $condominios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('app.admin.condominio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request){
        //obtiene los request 
        $unidades = $request->nombre_unidad;
        $numero_unidades = $request->numero_unidad;

        //crea el nuevo condominio
        $condominio = new Condominio;
        $condominio->nombre = $request->nombre;
        $condominio->direccion = $request->direccion;
        $condominio->url_img = $request->file('logo')->store('logos');
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
                $up->tipo_unidades_id = $aux->id;
                $up->condominio_id = $condominio->id;
                $up->save();
                
            }
        }
        return redirect()->route('condominio.index')
                        ->with('success', 'Condominio creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Condo  $condo
     * @return \Illuminate\Http\Response
     */
    public function show(Condominio $condo){
        $condo = Condominio::find($condo->id);

        return view('condominio.show')->with('condo', $condo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Condo  $condo
     * @return \Illuminate\Http\Response
     */
    public function edit(Condominio $condo){
        $condo = Condominio::find($condo->id);

        return view('condominio.edit')->with('condo', $condo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Condo  $condo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCondo $request, Condo $condo){
        $condo = Condominio::find($condo->id);

        switch ($request->area) {
            case 'name':
                $condo->name = $request->name;
                break;

            case 'address':
                $condo->address = $request->address;
                break;
                
            default:
                return redirect()->route('condos.index')
                                ->with('error', 'Hubo un problema al actualizar el condominio, intente de nuevo');
                break;
        }

        $condo->save();

        return redirect()->route('condos.index')
                        ->with('success', 'Condominio actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Condo  $condo
     * @return \Illuminate\Http\Response
     */
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
