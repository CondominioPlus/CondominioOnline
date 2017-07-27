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
            <form class="ui form" method="POST" action="{{route('tipo_unidad.update',$tup->id)}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
                <div class="two fields">
                    <div class="field">
                        <label>Nombre</label>
                        <input type="text" value="{{$tup->nombre}}" placeholder="{{$tup->nombre}}" name="nombre">
                    </div>
                    <div class="field">
                        <label>Descripción</label>
                        <textarea value="{{$tup->descripcion}}" placeholder="{{$tup->descripcion}}" rows="2" name="descripcion"></textarea>
                    </div>
                </div>
                <button class="ui button green right floated"> Guardar </button>
            </form>
        </div>
    </div>
</div>
@endsection