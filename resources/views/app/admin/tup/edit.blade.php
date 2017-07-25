@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="row">
        <div class="column">
            <div class="ui clearing blue segment">
                <div style="position: relative; top: 8px;" class="ui left floated header">Tipos de unidad privativa</div>
                <div class="ui right floated blue buttons">
                    <a class="ui button" href="{{ route('tipo_unidad.index') }}">
                        <i class="left angle icon"></i>
                        Atras
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row"> <br> </div>
    <div class="row"> @include('layouts._message') </div>
    <div class="row"> <br> </div>


    <div class="row">
        <div class="column">
            {{$tup}}
        </div>
    </div>
</div>
@endsection