@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Tipos de unidad privativa</div>
                <div class="ui right floated blue buttons">
                    <a class="ui button" href="{{ route('tipo_unidad.index') }}">
                        <i class="left angle icon"></i>
                        Atras
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row"> <br> </div>
    <div class="row"> @include('layouts._message') </div>
    <div class="row"> <br> </div>


    <div class="row">
        <div class="column">
            <form class="ui form" method="POST" action="{{route('tipo_unidad.store')}}">
            {{ csrf_field() }}
                <div class="three fields">
                    @if($errors->has('tipo_unidad'))
                        <div class="field error">
                    @else
                        <div class="field">
                    @endif
                        <label>Condominio al que pertenece</label>
                        <select class="ui dropdown" name="condominio">
                            @foreach($condominios as $condominio)
                                <option value="{{$condominio->id}}">{{$condominio->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label>Nombre</label>
                        <input type="text"  placeholder="Casa | Lote |  Departamento" name="nombre">
                    </div>
                    <div class="field">
                        <label>Descripción</label>
                        <textarea placeholder="" rows="2" name="descripcion"></textarea>
                    </div>
                </div>
                
                <button class="ui button green right floated"> Guardar </button>
            </form>
        </div>
    </div>
</div>
@endsection