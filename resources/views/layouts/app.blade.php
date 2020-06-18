<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CDSonrisa') }}</title>

    <link rel="icon" href="{{asset('dist/img/core-img/icos.png')}}">
    <link rel="stylesheet" href="{{asset('dist/style.css')}}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="https://fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('dist/css/stylus.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/toastr.min.css')}}">

    <!-- Styles -->
</head>
<body class="login">
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-primary text-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'CDSonrisa') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            Bienvenidos a la pagina login
                            <!-- <li class="nav-item">
                                <li><a href="{{ url('/login') }}">Login</a></li>
                            </li>

                            <li class="nav-item">
                                <a href="/categoria" class="nav-link">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/register') }}" class="nav-link">registr</a>
                            </li> -->

                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Usuario: {{ Auth::user()->name }} <!-- <span class="caret"></span> -->
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container" >
            @yield('content')
        </main>
    </div>
    
    <script src="{{asset('dist/js/jquery.min.js')}}"></script>
    <script src="{{asset('dist/js/toastr.min.js')}}"></script>
    @stack('scripts')
</body>
</html>
