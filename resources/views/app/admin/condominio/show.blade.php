@extends('layouts.app')

@section('content')
<div class="ui container ">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
            
                <form method="POST" action="{{ route('condominio.destroy', $condominio->id) }}" style="display: inline;">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="ui right floated red button"> <i class="trash icon"></i>Eliminar </button>
                </form>

                <a href="{{ route('condominio.edit', $condominio->id) }}" class="ui right floated yellow button">
                    <i class="edit icon"></i>
                    Editar
                </a>
                
                
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
                    <img class="ui centered small  image" src="{{url($condominio->url_img)}}">
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
        </div>
    </div>
</div>
@endsection