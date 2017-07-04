<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Mi Condominio Online') }}</title>

        <!-- Styles -->
        <link href="{{asset('dist/semantic.min.css')}}" rel="stylesheet">
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('dist/semantic.min.js')}}"></script>
        <script>
            $(document).ready(function(){
                $('.message .close').on('click', function() {
                    $(this).closest('.message').transition('fade');
                }) ;
            });
            
        </script>
    
    </head>
    <body>
        
        <div class="ui text container">

            <div class="ui blue attached message">
                <h2 class="ui header">
                    <div class="content">
                        ¡ Gracias por registrate con nosotros !
                        <div class="sub header">Empecemos con el proceso de registro.</div>
                    </div>
                </h2>
            </div>
            <br>
            <div class="ui big breadcrumb">
                <div class="section">Administrador</div>
                <i class="right chevron icon divider"></i>
                <div class=" active section">Condominio</div>
                <i class="right chevron icon divider"></i>
                <div class="section">Unidades Privatrivas</div>
            </div>
        
            <div class="ui raised segment">

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

                

                
                <form class="ui form attached fluid " method="POST" action="{{route('condoStore')}}" enctype="multipart/form-data">
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


                    <button  class="ui green button" >Continuar</button>
                </form>
                
            </div>
            
        </div>


        @yield('scripts')
        
    </body>
</html>
