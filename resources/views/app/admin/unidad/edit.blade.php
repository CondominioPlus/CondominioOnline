@extends('layouts.app')


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
                <h1 class="ui header">
                    <div class="content">
                        {{$unidad->tipo_unidad->nombre}} {{$unidad->numero}}
                        <div class="sub header">{{$unidad->condominio->nombre}}</div>
                    </div>
                </h1>

                <div class="ui raised segment">
                    <form class="ui form attached fluid " method="POST" action="{{route('unidad.update',$unidad->id)}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ method_field('PUT') }}
                        <div class=" fields">
                            @if($errors->has('numero'))
                                <div class="field error">
                            @else
                                <div class="field">
                            @endif
                                <label>Número </label>
                                <input value="{{null!=old('numero') ? old('numero') : $unidad->numero}}" name="numero" placeholder="{{$unidad->numero}}" type="text">
                            </div>

                            
                            @if($errors->has('numero_cajones'))
                                <div class="field error">
                            @else
                                <div class="field">
                            @endif
                                <label>Cajones Estacionamiento</label>
                                <input value="{{null!=old('numero_cajones') ? old('numero_cajones') : $unidad->numero_cajones}}" name="numero_cajones" placeholder="{{$unidad->numero_cajones}}" type="text">
                            </div>


                            @if($errors->has('tipo_unidad'))
                                <div class="field error">
                            @else
                                <div class="field">
                            @endif
                                <label>Tipo Unidad Privativa</label>
                                <select class="ui dropdown" name="tup">
                                    @foreach($unidad->condominio->tipo_unidades as $tup)
                                        @if($tup->id == $unidad->tipo_unidad->id)
                                            <option selected value="{{$tup->id}}">{{$tup->nombre}}</option>
                                        @else
                                            <option value="{{$tup->id}}">{{$tup->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            

                        </div>
                        @if($errors->has('notas'))
                            <div class="field error">
                        @else
                            <div class="field">
                        @endif
                            <label>Notas</label>
                            <textarea placeholder="{{null!=old('notas') ? old('notas') : $unidad->notas}}" rows="2" name="notas">{{null!=old('notas') ? old('notas') : $unidad->notas}}</textarea>
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