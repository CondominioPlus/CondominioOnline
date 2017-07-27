@extends('layouts.app')

@section('scripts')
<script>
    $(document).ready(function(){
        //alert();
        $('.condominio').dropdown('setting', 'onChange', function(val){
            $("#tipo_unidad").html('');
            //$("#tipo_unidad").dropdown();

            if(val!=0){
                $(".condominio").addClass('disabled');
                $("#tipo_unidad").addClass('loading');
                $("#tipo_unidad").addClass('disabled');
                $.ajax({
                    method: "GET",
                    url: "{{route('tup.ajax.condo')}}",
                    data: { id: val,},
                    dataType: "json"
                }).done(function( data ) {
                    var tups = JSON.parse(data);
                    var html='';
                    $.each(tups, function(i,tup){
                        html+='<option value="'+tup.id+'">'+tup.nombre+"</option>"
                    });

                    $("#tipo_unidad").append(html);
                });
                //$("#tipo_unidad").removeClass('disabled');
                    //$("#tipo_unidad").removeClass('loading');

                //.delay(1000).removeClass('disabled').removeClass('loading');
                setTimeout(function(){
                    $(".condominio").removeClass('disabled');
                    $("#tipo_unidad").removeClass('loading');
                    $("#tipo_unidad").removeClass('disabled');
                    
                    $("#tipo_unidad").dropdown('refresh');
                },1000);

                
            }
            
        });
        
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
                    <div class="ui right floated blue buttons">
                        <a class="ui button" href="{{ route('unidad.index') }}">
                            <i class="left angle icon"></i>
                            Atras
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row"> <br> </div>
    <div class="row"> @include('layouts._message') </div>
    <div class="row"> <br> </div>


    <div class="row">

        <div class="ui segments">
            <div class="ui blue segment">


                <div class="ui raised segment">
                    <form class="ui form attached fluid " method="POST" action="{{route('unidad.store')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class=" fields">

                            @if($errors->has('condominio'))
                                <div class="field error required">
                            @else
                                <div class="field required">
                            @endif
                                <label>Condominio</label>
                                <select class="ui dropdown condominio" name="condominio" id="condominio">
                                    <option value="0"  > Selecciona una opcion </option>
                                    @foreach($condominios as $condominio)
                                        <option value="{{$condominio->id}}" > {{$condominio->nombre}} </option>
                                    @endforeach

                                </select>
                            </div>

                            @if($errors->has('tipo_unidad'))
                                <div class="field error">
                            @else
                                <div class="field">
                            @endif
                                <label>Tipo Unidad Privativa</label>
                                <select class="ui dropdown " name="tup" id="tipo_unidad">

                                </select>
                            </div>


                            @if($errors->has('numero'))
                                <div class="field error">
                            @else
                                <div class="field">
                            @endif
                                <label>Número </label>
                                <input value="{{old('numero')}}" name="numero" placeholder="10" type="text">
                            </div>

                            
                            @if($errors->has('numero_cajones'))
                                <div class="field error">
                            @else
                                <div class="field">
                            @endif
                                <label>Cajones Estacionamiento</label>
                                <input value="{{ old('numero_cajones')}}" name="numero_cajones" placeholder="2" type="text">
                            </div>

                            

                        </div>
                        @if($errors->has('notas'))
                            <div class="field error">
                        @else
                            <div class="field">
                        @endif
                            <label>Notas</label>
                            <textarea placeholder="{{old('notas')}}" rows="2" name="notas">{{old('notas')}}</textarea>
                        </div>

                        
                        

                        <button class="ui right floated button green">Guardar</button>
                        <br><br>
                    </form>
                </div>
            </div>
            
           
        </div>

    </div>
</div>
@endsection