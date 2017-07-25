@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Tipos de unidad privativa</div>
                <div class="ui right floated buttons">
                    <a class="large  ui right floated green labeled icon button" href="{{ route('tipo_unidad.create') }}"><i class="add icon"></i> Agregar</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row"> <br> </div>
    <div class="row"> @include('layouts._message') </div>
    <div class="row"> <br> </div>


    <div class="row">
        <div class="column">
            @if($condominios)
                <table class="ui three column selectable blue table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($condominios as $condominio)
                            @foreach($condominio->tipo_unidades as $tipo_unidad)   
                            <tr>
                                <td>{{ $tipo_unidad->nombre }}</td>
                                <td>{{ $tipo_unidad->descripcion }}</td>
                                <td>
                                    <div class="ui small buttons">        
                                        <a class="ui blue button" href="{{ route('tipo_unidad.edit', $tipo_unidad->id) }}">Editar</a>
                                        <form method="POST" action="{{ route('tipo_unidad.destroy', $tipo_unidad->id) }}" style="display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="ui red button">Borrar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection