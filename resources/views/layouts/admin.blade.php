<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Las 4 metaetiquetas anteriores deben aparecer primero en la cabeza; cualquier otro contenido principal debe venir después de estas etiquetas -->

    <!-- Titulo  -->
    <title>Sindicato de Transporte 9 de Noviembre</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('dist/img/core-img/icos.png')}}">

    <!-- Estilo CSS -->

    <link rel="stylesheet" href="{{asset('dist/style.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/fileinput.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/stylus.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/impresion.css')}}" media="print">

</head>

<body>
    <!-- Precargador -->
    <div id="preloader">
        <div class="medilife-load"></div>
    </div>

    <!-- ***** Inicio del área de encabezado ***** -->
    <header class="header-area">
        <!-- Inicio del área de encabezado -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="h-100 d-md-flex justify-content-between align-items-center">
                            <p>Bienvenidos al <span>Sindicato</span></p>
                            <p>Se puede viajar de : <span>lunes a viernes - 8am a 5pm</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area de encabezado principal -->
        <div class="main-header-area" id="stickyHeader">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 h-100">
                        <div class="main-menu h-100">
                            <nav class="navbar h-100 navbar-expand-lg">
                                <!-- Logo Area  -->
                                <a class="navbar-brand" href="{{url('inicio')}}" ><img src="{{asset('dist/img/core-img/auta.png')}}" width="90%" alt="Logo"></a>

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                                <div class="collapse navbar-collapse" id="medilifeMenu">
                                    <!-- Menu Area -->
                                    <ul class="navbar-nav ml-auto">
                                        @if(Auth::user()->rol=="Administrador")
                                        <li class="nav-item " id="liusuario">
                                                <a class="nav-link" href="{{url('usuario')}}">Usuarios</a>
                                        </li>
                                        @endif
                                        
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Registro</a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a href="{{url('cliente')}}" class="dropdown-item" id="licliente"><i class="fa fa-user"></i> Choferes</a>
                                                <a href="{{url('proveedor')}}" class="dropdown-item" id="liproveedor"><i class="fa fa-user"></i> Mecanicos</a>
                                            </div>
                                        </li>
                                        <li class="nav-item" id="licategoria">
                                                <a class="nav-link" href="{{url('categoria')}}">Tipo de vehiculo</a>
                                        </li>
                                        <li class="nav-item" id="liproducto">
                                                <a class="nav-link"href="{{url('producto')}}">Vehiculo</a>
                                        </li>
                                        <li class="nav-item" id="liingreso">
                                                <a class="nav-link" href="{{url('ingreso')}}">Ganancia</a>
                                        </li>
                                        <li class="nav-item" id="liventa">
                                                <a class="nav-link" href="{{url('venta')}}">Pasajes</a>
                                        </li>

                                         <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <!-- <a id="lireportei" class="dropdown-item" href="{{url('reporte/ingreso')}}"><i class="fa fa-cart-plus"></i> Ingresos</a>
                                                <a id="lireportev" class="dropdown-item" href="{{url('reporte/venta')}}"><i class="fa fa-cart-arrow-down"></i> Ventas</a>
                                                -->
                                                @if(Auth::user()->rol=="Administrador")
                                                    <a id="lireportec" class="dropdown-item" href="{{url('reporte/cliente')}}"><i class="fa fa-user"></i> Choferes</a>
                                                    <a id="lireportep" class="dropdown-item" href="{{url('reporte/registro')}}"><i class="fa fa-list-alt"></i> Mecanicos</a>
                                                @endif
                                            </div>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="dropdown-toggle btn btn-success ml-30" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->rol }}: {{ Auth::user()->name }}</a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                                <a id="liavisof" class="dropdown-item" href="{{url('aviso/fecha')}}"><span class="fa fa-calendar-times-o"></span> Alerta De salida</a>
                                           
                                                <!-- <a id="liavisos" class="dropdown-item" href="{{url('aviso/cantidad')}}"><span class="fa fa-info-circle"></span> Alerta Stock</a> -->
                                                
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                     onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                <span class="fa fa-sign-out"></span> Cerrar Sesion</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Fin del área del encabezado ***** -->

    <!-- ***** Inicio del área de pan ***** -->
    <section class="breadcumb-area bg-img gradient-background-overlay" style="background-image: url({{asset('dist/img/bg-img/terminal.jpg') }} );">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">9 de Noviembre</h3>
                        <p>La seguridad es lo primero para usted y para nosotros</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="medilife-tabs-areas section-padding-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    @yield('contenido')
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Tabs Area End ***** -->

    <!-- ***** Inicio del área de pie de página ***** -->
    <footer class="footer-area section-padding-100">
        <!-- Área de pie de página principal -->
        <div class="main-footer-area">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12 col-sm-12 col-xl-12">
                        <div class="footer-widget-area">
                            <div class="footer-logo">
                                <img src="{{asset('dist/img/core-img/auto.png')}}" alt="">
                            </div>
                            <p>Transporte, medio de traslado de personas o bienes desde un lugar hasta otro. El transporte comercial moderno está al servicio del interés público e incluye todos los medios e infraestructuras implicados en el movimiento de las personas o bienes, así como los servicios de recepción, entrega y manipulación de tales bienes.</p>
                            <div class="footer-social-info">
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <!-- Área de pie de página inferior-->
        <div class="bottom-footer-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="bottom-footer-content">
                            <!-- Copywrite Text -->
                            <div class="copywrite-text">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; 2020 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <!-- <script src="{{asset('dist/js/jquery.min.js')}}"></script> -->
    <script src="{{asset('dist/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dist/js/dataTables.min.js')}}"></script>
    <script src="{{asset('dist/js/active.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('dist/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <!-- Plugins js -->
    <script src="{{asset('dist/js/plugins.js')}}"></script>
    <!-- Active js -->

    <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery.validate.js')}}"></script>

    <script src="{{asset('dist/js/toastr.min.js')}}"></script>
    <script src="{{asset('dist/js/fileinput.min.js')}}"></script>
    <script src="{{asset('dist/js/jquery-ui.js')}}"></script>
    <script src="{{asset('dist/js/jquery.print.js')}}"></script>
    <script src="{{asset('dist/js/work.js')}}"></script>
    @stack('scripts')
</body>

</html>