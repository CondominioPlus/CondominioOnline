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
                    <form class="ui form attached fluid " method="POST" action="{{route('userStore')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="two fields">
                            @if($errors->has('nombre'))
                                <div class="field required error">
                            @else
                                <div class="field required">
                            @endif
                                <label>Nombre </label>
                                <input value="{{old('nombre')}}" name="nombre" placeholder="Hugo Ricardo" type="text">
                            </div>
                            @if($errors->has('apellidos'))
                                <div class="field required error">
                            @else
                                <div class="field required">
                            @endif
                                <label>Apellidos</label>
                                <input value="{{old('apellidos')}}" name="apellidos" placeholder="De la Rosa Coronado" type="text">
                            </div>
                        </div>
                        <div class="two fields">
                            @if($errors->has('email'))
                                <div class="field required error">
                            @else
                                <div class="field required">
                            @endif
                                <label>Correo Electrónico </label>
                                <input value="{{old('email')}}" name="email" placeholder="hugo.delarosa@justsign.mx" type="text">
                            </div>
                            @if($errors->has('telefono'))
                                <div class="field required error">
                            @else
                                <div class="field required">
                            @endif
                                <label>Teléfono</label>
                                <input value="{{old('telefono')}}" name="telefono" placeholder="4422228088" type="text">
                            </div>
                        </div>
                        <div class="two fields">
                            @if($errors->has('password'))
                                <div class="field required error">
                            @else
                                <div class="field required">
                            @endif
                                <label>Contraseña </label>
                                <input name="password" placeholder="" type="password">
                            </div>
                            @if($errors->has('password'))
                                <div class="field required error">
                            @else
                                <div class="field required">
                            @endif
                                <label>Confirma Contraseña</label>
                                <input name="password_confirmation" placeholder="" type="password">
                            </div>
                        </div>
                        <button  class="ui green button" >Continuar</button>
                    </form>
                </div>
            </div>
            
           
        </div>

    </div>
</div>
@endsection