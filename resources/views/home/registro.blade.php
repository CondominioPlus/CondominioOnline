<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Mi Condominio Online') }}</title>

        <!-- Styles -->
        <link href="dist/semantic.min.css" rel="stylesheet">

    
    </head>
    <body>
        
        <div class="ui text container">
            <div class="ui info attached message">
                <div class="header">
                    Bienvenido
                </div>
                <p>Por favor ingresa los datos del usuario administrador</p>
            </div>
            <div class="ui raised segment">
                <form>
                </form>
            </div>
        </div>


        @yield('scripts')
        
    </body>
</html>
