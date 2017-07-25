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
                <table class="ui three column selectable blue table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($condominios as $condominio)   
                            <tr>
                                <td>{{ $condominio->nombre }}</td>
                                <td>{{ $condominio->direccion }}</td>
                                <td>
                                    <div class="ui small buttons">
                                        <a class="ui green button" href="{{ route('condominio.show', $condominio->id) }}">Info</a>
                                        <a class="ui blue button" href="{{ route('condominio.edit', $condominio->id) }}">Editar</a>
                                        <form method="POST" action="{{ route('condominio.destroy', $condominio->id) }}" style="display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="ui red button">Borrar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    @if($condominios->count() >1)
                        <tfoot>
                            <tr><th colspan="3">
                                <div class="ui right floated pagination menu">
                                    <a href="$condominios->previousPageUrl()" class="icon item">
                                        <i class="left chevron icon"></i>
                                    </a>
                                    @for($i=1; $i< $condominios->count(); $i++)
                                        <a href="{{$condominios->url($i)}}" class="item">{{$i}}</a>
                                    @endfor
                                    <a href="{{$condominios->nextPageUrl()}}"  class="icon item">
                                        <i class="right chevron icon"></i>
                                    </a>
                                </div>
                                </th>
                            </tr>
                        </tfoot>
                    @endif
                </table>

            @else

                <div class="ui segment padded">
                    <center>
                        <div class="ui big compact floating message">
                            <p>Inicia registrando tu condominio</p>
                        </div>
                    </center>
                    
                </div>

            @endif



        </div>
    </div>
    
</div>
@endsection