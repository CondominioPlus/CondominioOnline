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
                    </div>
                </h2>
            </div>
            <br>
        
            <div class="ui raised segment">
            <h2 class="ui teal header">
                <i class="settings icon"></i>
                <div class="content">
                    Configuración del Espacio
                    <div class="sub header">Ingresa la información del usuario Administrador.</div>
                </div>
            </h2>

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
            <div class="ui bottom attached warning message">
                <i class="icon help"></i>
                ¿Ya estas registrado? <a href="{{route('login')}}">Ingresa aqui</a>
            </div>
            
        </div>


        @yield('scripts')
        
    </body>
</html>
