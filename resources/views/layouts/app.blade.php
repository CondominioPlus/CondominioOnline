<!-- General View for the application , the major template-->

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mi Condominio Online') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/semantic-ui/semantic.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script src="https://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>
</head>
<body>
    <nav class="ui large borderless inverted blue menu">
        <div class="header active item">Mi Condominio Online</div>
        <div class="right menu">
            @if (Auth::guest())
                <a class="item" href="{{ route('login') }}">Iniciar Sesión</a>
                <a class="item" href="{{ route('register') }}">Registrarse</a>
            @else
                <div class="ui dropdown item">
                    {{ Auth::user()->name }}
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a class="item" href="{{ route('logout') }}"
                         onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();">
                        Salir
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </nav>
        @if (Auth::guest())
            @yield('content')
        @else
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
        @endif
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/semantic-ui/semantic.min.js"></script>
    <script>
        $('.ui.checkbox')
         .checkbox()
        ;
        $('.ui.accordion')
        .accordion()
        ;

    $('.ui .dropdown').dropdown();

    </script>
    @yield('scripts')
    
</body>
</html>
