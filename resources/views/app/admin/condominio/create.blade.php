@extends('layouts.app')

@section('scripts')
<script>
    function agregaTUP(){
        var html = '<div class="fields">';
            html+='<div class="ten wide field">';
            html += '<label>Tipo de Unidad</label>';
            html+='<input type="text" class="datos_promoventes" name="nombre_unidad[]" >';
            html+='</div><div class="three wide field"><label>NO. Unidades</label>';
            html+='<input type="text" class="datos_promoventes" name="numero_unidad[]" >';
            html+='</div><div class="three wide field"><br><button type="button" onclick="quitaTUP(this)" class="ui medium circular right icon button">';
            html+='<i class="trash icon"></i></button></div></div>';

        $("#tup").append(html);
        
    }

    function quitaTUP(obj){
        var b = $(obj).parent().parent();
        b.remove();
    }
</script>
@endsection

@section('content')




<div class="ui container">
    @if ($errors->any())

        <div class="ui error message">
            <i class="close icon"></i>
            <div class="header">
                Hay algunos errores en los datos, por favor solucionalos para continuar.
            </div>
            <ul class="list">
                @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Creación del Condominio</div>
                <a class="ui right floated blue button" href="{{ route('condominio.index') }}">
                    <i class="angle left icon"></i>
                    Atras
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <div class="ui blue segment">
                <div class="ui centered grid">
                    <div class="ten wide column">
                        <div class="ui horizontal divider">
                            Información del condominio
                        </div>
                        <form class="ui form attached fluid " method="POST" action="{{route('condominio.store')}}" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="two fields">
                                @if($errors->has('nombre'))
                                    <div class="field required error">
                                @else
                                    <div class="field required">
                                @endif
                                    <label>Nombre </label>
                                    <input value="{{old('nombre')}}" name="nombre" placeholder="Claustros del Marques" type="text">
                                </div>
                                @if($errors->has('direccion'))
                                    <div class="field required error">
                                @else
                                    <div class="field required">
                                @endif
                                    <label>Dirección</label>
                                    <input value="{{old('direccion')}}" name="direccion" placeholder="Fray Luis de Leon 3000, Querétaro, Querétaro" type="text">
                                </div>
                            </div>
                            
                            @if($errors->has('logo'))
                                <div class="field required error">
                            @else
                                <div class="field required">
                            @endif
                                <label>Logo </label>
                                <input name="logo" placeholder="" type="file" accept="image/*">
                            </div>

                            <div class="ui horizontal divider">
                                Tipo de Unidades Privativas
                            </div>

                            <div id="tup">
                                <div class="fields">
                                    <div class="ten wide field">
                                        <label>Tipo de Unidad</label>
                                        <input type="text" class="datos_promoventes" name="nombre_unidad[]" >
                                    </div>
                                    <div class="three wide field">
                                        <label>NO. Unidades</label>
                                        <input type="text" class="datos_promoventes" name="numero_unidad[]" >
                                    </div>

                                    <div class="three wide field">
                                        <br>
                                        <button type="button" onclick="agregaTUP()" class="ui small right labeled icon button">
                                            <i class="plus icon"></i>
                                            Agregar
                                        </button>
                                    </div>
                                    
                                </div>

                            </div>


                            <button  class="ui right floated green button" >Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection