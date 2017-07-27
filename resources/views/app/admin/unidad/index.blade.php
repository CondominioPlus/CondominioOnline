@extends('layouts.app')

@section('scripts')
<style>
    #contenido{ display:none;}
</style>
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.semanticui.min.js"></script>
<script>

    $(document).ready(function(){
        $('.ui.dropdown').dropdown();
        
        $('table').DataTable( {
            "lengthMenu": [[7,14, -1], [7,14,"Todas"]],
            "language": {
                "lengthMenu": "Mostrar _MENU_ unidades por hoja",
                "zeroRecords": "No hay resultados",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay resultados",
                "infoFiltered": "(filtrados de _MAX_  unidades)"
            }
        } );
        $("#espera").hide();
        $("#contenido").delay(450).fadeIn();
        
    });
        
</script>
@endsection

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Unidades Privativas</div>
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

        <div class="ui blue segment" id="contenido" >

            <table class="ui three column selectable table " cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Condominio</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($condominios as $condominio)
                        @foreach($condominio->unidades as $unidad)
                            <tr>
                                <td>{{$unidad->condominio->nombre}}</td>
                                <td>{{$unidad->tipo_unidad->nombre}} {{$unidad->numero}}</td>

                                <td>
                                    <div class="ui small buttons">        
                                        <a class="ui blue button" href="{{ route('unidad.edit', $unidad->id) }}">Editar</a>
                                        <form method="POST" action="{{ route('unidad.destroy', $unidad->id) }}" style="display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="ui red button">Eliminar</button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    @endforeach
                    
                </tbody>
            </table>
           
        </div>

        <div class="ui loading segment" id="espera">
            <p></p>
            <p></p>
        </div>
    </div>
</div>
@endsection