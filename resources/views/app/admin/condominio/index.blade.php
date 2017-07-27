@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui raised clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Condominios</div>
                <a class="large  ui right floated green labeled icon button" href="{{ route('condominio.create') }}"><i class="add icon"></i> Agregar</a>
            </div>
        </div>
    </div>
    <div class="row"> <br> </div>
    <div class="row"> @include('layouts._message') </div>
    <div class="row"> <br> </div>
    
    <div class="row">
        <div class="column">
            @if(count($condominios) >0)
                <div class="ui special cards">
                @foreach($condominios as $condominio)
                    <div class="ui card">
                        <div class="blurring dimmable image">
                            <div class="ui dimmer">
                                <div class="content">
                                    <div class="center">
                                        <a href="{{route('condominio.edit',$condominio->id)}}" class="ui yellow inverted button">Editar</a>
                                        <form method="POST" action="{{ route('condominio.destroy', $condominio->id) }}" style="display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="ui red inverted button">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ isset($condominio->url_img) ? url($condominio->url_img) : '/imagenes/logo.png' }}">
                        </div>
                        <div class="content">
                            <a href="{{ route('condominio.show', $condominio->id) }}" class="header">{{$condominio->nombre}}</a>
                            <div class="meta">
                            <span class="date">{{$condominio->direccion}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                

            @else

                <div class="ui segment padded">
                    <center>
                        <div class="ui big compact floating message">
                            <p>Inicia registrando tu condominio</p>
                        </div>
                    </center>
                    
                </div>

            @endif

            @if($condominios->lastPage()>1)
                <div class="ui right floated pagination menu">

                    <a class="icon item" href="{{$condominios->previousPageUrl()}}">
                        <i class="left chevron icon"></i>
                    </a>

                    @for($i=max($condominios->currentPage()-2,1); $i <= max(1,min($condominios->lastPage(),$condominios->currentPage()+2 )) ; $i++)
                        @if($i == $condominios->currentPage())
                            <a class="blue disabled item" href="{{$condominios->url($i)}}">{{$i}}</a>
                        @else
                            <a class="item" href="{{$condominios->url($i)}}">{{$i}}</a>
                        @endif
                    @endfor


                    <a class="icon item"  href="{{$condominios->nextPageUrl()}}">
                        <i class="right chevron icon"></i>
                    </a>
                </div>
            @endif



        </div>
    </div>
    
</div>
@endsection