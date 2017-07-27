@extends('layouts.app')

@section('content')
<div class="ui container ">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Condominio {{ $condominio->nombre }}</div>
                <a href="{{ route('condominio.index') }}" class="ui right floated blue button">
                    <i class="angle left icon"></i>
                    Atras
                </a>
            </div>
        </div>
    </div>
    <div class="row"> <br> </div>
    <div class="row"> @include('layouts._message') </div>
    <div class="row"> <br> </div>

    <div class="row">
        <div class="ui  segments">
            
            <div class="ui horizontal segments">
                <div class="ui  segment">
                    <img class="ui centered medium image " src="{{ isset($condominio->url_img) ? url($condominio->url_img) : '/imagenes/logo.png' }}">
                </div>
                <div class="ui segment">
                    <h1 class="ui header">
                        <div class="content">
                            {{$condominio->nombre}}
                            <div class="sub header">{{$condominio->direccion}}</div>
                        </div>
                    </h1>
                    <div class="ui piled segment">
                        <h4 class="ui header ">
                            <i class="home icon"></i>
                            Unidades Privativas
                        </h4>
                        <div class="ui relaxed divided list">
                            @foreach($condominio->tipo_unidades as $tup)
                                <div class="item">
                                    <div class="content">
                                        <div class="header">{{$tup->nombre}}(s) :</div>
                                        <div class="description">{{count($tup->unidades)}}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui segment">
                <form class="ui form attached fluid " method="POST" action="{{route('condominio.update',$condominio->id)}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ method_field('PUT') }}
                    <div class="two fields">
                        @if($errors->has('nombre'))
                            <div class="field error">
                        @else
                            <div class="field">
                        @endif
                            <label>Nombre </label>
                            <input value="{{$condominio->nombre}}" name="nombre" placeholder="{{$condominio->nombre}}" type="text">
                        </div>
                        @if($errors->has('direccion'))
                            <div class="field error">
                        @else
                            <div class="field">
                        @endif
                            <label>Dirección</label>
                            <input value="{{$condominio->direccion}}" name="direccion" placeholder="{{$condominio->direccion}}" type="text">
                        </div>
                    </div>
                    
                    @if($errors->has('logo'))
                        <div class="field error">
                    @else
                        <div class="field">
                    @endif
                        <label>Logo </label>
                        <input name="logo" placeholder="" type="file" accept="image/*">
                    </div>

                    <button class="ui right floated button green">Guardar</button>
                    <br><br>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection