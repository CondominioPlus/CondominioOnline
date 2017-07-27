<!-- General View for the application , the major template-->

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Mi Condominio Online') }}</title>
    <script src="/js/jquery.min.js"></script>
    <script src="/dist/semantic.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>
    <script>
        $('.ui.checkbox').checkbox();
        $('.ui.accordion').accordion();
        $('.ui .dropdown').dropdown();

        $('.message .close').on('click', function() {
            $(this).closest('.message').transition('fade');
        }) ;

        $('.special.cards .image').dimmer({
            on: 'hover'
        });

    </script>
    @yield('scripts')

    <link href="/dist/semantic.min.css" rel="stylesheet">

    
</head>
<body>
    
            <div class="ui  menu">
               
                <div class="right menu">
                    <div class="ui dropdown item">
                        {{Auth::user()->nombre}}  {{Auth::user()->apellidos}}
                        <i class="dropdown icon"></i>
                        <div class="menu">
                        <a class="item">Modificar</a>
                        <a class="item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir<i class="sign out icon"></i></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui fluid container">
                <div class="ui stackable grid">
                    <div class="three wide column">
                        @include('layouts._sidenav')
                    </div>
                    <div class="thirteen wide column">
                        @yield('content')
                    </div>
                </div>
            </div>

 
</body>
</html>
