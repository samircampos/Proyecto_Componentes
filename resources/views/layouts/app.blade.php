<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Componentes') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: black;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                 @guest
                        <img src="https://seeklogo.com/images/P/phd-pecas-e-componentes-logo-50E8297448-seeklogo.com.png" width="55px" height="55px" >
                @else
                    <a >
                            <img src="https://seeklogo.com/images/P/phd-pecas-e-componentes-logo-50E8297448-seeklogo.com.png" width="55px" height="55px" >
                    </a>
                        <a class="btn btn-default " href="{{route('home')}}"><i class="bi bi-clipboard-fill"></i>Datos</a>
                        <a class="btn btn-default " href="{{route('usuarios')}}"><i class="bi bi-person-fill"></i>Usuarios</a>
                        <a class="btn btn-default " href="{{route('clientes')}}"><i class="bi bi-people-fill"></i> Clientes</a>
                        <a class="btn btn-default " href="{{route('proveedor')}}"><i class="bi bi-cart-plus-fill"></i> Proveedor</a>
                        <a class="btn btn-default " href="{{route('productos')}}"><i class="bi bi-basket2-fill"></i> Productos</a>
                        <a class="btn btn-default " href="{{route('facturas.index')}}"> <i class="bi bi-file-text-fill"></i> Factura</a>
                        <a class="btn btn-default " href="{{route('compania')}}"> <i class="bi bi-file-text-fill"></i> Compania</a>
                        
                @endguest
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
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesion</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                     <img src="https://seeklogo.com/images/P/phd-pecas-e-componentes-logo-50E8297448-seeklogo.com.png" style="margin-left: 20%;" width="30px" height="30px">
                                    {{ Auth::user()->usu_nombre }}  {{ Auth::user()->usu_apellido}}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <img src="https://seeklogo.com/images/P/phd-pecas-e-componentes-logo-50E8297448-seeklogo.com.png" style="margin-left: 20%;" width="90px" height="90px" alt="Imagen no se pudo cargar">
                                                <h5 style="text-align: center;">Bienvenid@</h5>
                                                <h5 style="text-align: center;">{{ Auth::user()->usu_nombre }}  {{ Auth::user()->usu_apellido}}</h5>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="bi bi-x-circle-fill"></i>  Cerrar Sesion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('Salir') == 'Si')
    <script>
      Swal.fire(
                    'Session Cerrada Correctamente',
                    ' ',
                    'success'
                  )
    </script>
    @endif
</body>
</html>