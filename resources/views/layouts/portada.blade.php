<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Las 4 metaetiquetas anteriores deben aparecer primero en la cabeza; cualquier otro contenido principal debe venir después de estas etiquetas -->

    <title>Sindicato de Transporte 9 de Noviembre</title>

    <link rel="icon" href="{{asset('dist/img/core-img/icos.png')}}">
    <link rel="stylesheet" href="{{asset('dist/style.css')}}">

</head>

<body>
    <!-- Precargador -->
    <div id="preloader">
        <div class="medilife-load"></div>
    </div>

    <!-- ***** Inicio del área de encabezado ***** -->
    <header class="header-area">
        <!-- Area de encabezado superior -->
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

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#medilifeMenu" aria-controls="medilifeMenu" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                                <div class="collapse navbar-collapse" id="medilifeMenu">    
                                    <!-- Menu Area -->
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="">Pagina principal <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pestañas</a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="index.html">Pagina principal</a>
                                                <a class="dropdown-item" href="about-us.html">Sobre nosotros</a>
                                                <a class="dropdown-item" href="services.html">Servicios</a>
                                                <a class="dropdown-item" href="contact.html">Contact</a>
                                                <a class="dropdown-item" href="elements.html">Eventos</a>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="about-us.html">Eventos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="services.html">Actividades</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="contact.html">Contactos</a>
                                        </li>
                                    </ul>
                                    <!-- Boton de cita -->
                                    <a href="{{ route('login') }}" class="btn btn-success ml-30">Iniciar Session</a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Fin del área del encabezado ***** -->

    <!-- ***** Inicio del area de heroe ***** -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Diapositiva de un solo heroe -->
            <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url(dist/img/bg-img/log.png);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Servicio de transporte en el <br>que puede llegar seguro</h2>
                                <h6 data-animation="fadeInUp" data-delay="400ms">La seguridad es lo primero para usted y para nosotros</h6>
                                <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp" data-delay="700ms">Se un cliente satisfecho <span>+</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Diapositiva de un solo héroe -->
            <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url(dist/img/bg-img/terminal.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Servicio de transporte en el <br>que puede llegar seguro</h2>
                                <h6 data-animation="fadeInUp" data-delay="400ms">La seguridad es lo primero para usted y para nosotros</h6>
                                <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp" data-delay="700ms">Se un cliente satisfecho <span>+</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Diapositiva de un solo héroe -->
            <div class="single-hero-slide bg-img bg-overlay-white" style="background-image: url(dist/img/bg-img/foto.png);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Servicio de transporte en el <br>que puede llegar seguro</h2>
                                <h6 data-animation="fadeInUp" data-delay="400ms">La seguridad es lo primero para usted y para nosotros</h6>
                                <a href="#" class="btn medilife-btn mt-50" data-animation="fadeInUp" data-delay="700ms">Se un cliente satisfecho <span>+</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Fin de area de heroe ***** -->

    <!-- ***** Reserve una cita Área de inicio ***** -->
    <div class="medilife-book-an-appoinment-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="appointment-form-content">
                        <div class="row no-gutters align-items-center">
                            <div class="col-12 col-lg-9">
                                <div class="medilife-appointment-form">
                                    <form action="#" method="post">
                                        <div class="row align-items-end">
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <select class="form-control" id="speciality">
                                                    <option>Minibus grande</option>
                                                    <option>Minibus normal</option>
                                                    <option>Caldina</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <select class="form-control" id="doctors">
                                                    <option>Placa 1158CDS</option>
                                                    <option>Placa 1995VFD</option>
                                                    <option>Placa 4561YNF</option>
                                                    <option>Placa 3546KMB</option>
                                                    <option>Placa 3185QBT</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="Fecha" id="Fecha" placeholder="Fecha">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="Hora" id="Hora" placeholder="Hora">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0" name="Nombre" id="Nombre" placeholder="Nombre">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0" name="Celular" id="Celular" placeholder="Celular">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0" name="email" id="email" placeholder="E-mail">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <div class="form-group mb-0">
                                                    <textarea name="message" class="form-control mb-0 border-top-0 border-right-0 border-left-0" id="Destino" cols="30" rows="10" placeholder="Destino"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-5 mb-0">
                                                <div class="form-group mb-0">
                                                    <button type="submit" class="btn btn-success">Contratar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="medilife-contact-info">
                                    <!-- Información de contacto unica -->
                                    <div class="single-contact-info mb-30">
                                        <img src="dist/img/icons/alarm-clock.png" alt="">
                                        <p>Lunes - Viernes 08:00 - 17:00 <br>Sabado y domingo cerrado</p>
                                    </div>
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info mb-30">
                                        <img src="dist/img/icons/envelope.png" alt="">
                                        <p>0080 673 729 766 <br>contact@business.com</p>
                                    </div>
                                    <!-- Single Contact Info -->
                                    <div class="single-contact-info">
                                        <img src="dist/img/icons/map-pin.png" alt="">
                                        <p>Desaguadero<br>La paz-El Alto</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Reserve fin de area de cita ***** -->

    <!-- ***** Características del área de inicio ***** -->
    <div class="medilife-features-area section-padding-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="features-content">
                        <h2>Una nueva forma de tratar a los pasajeros en nuestros servicios de transporte</h2>
                        <p>Transporte público o transporte en común es el término aplicado al transporte colectivo de pasajeros. A diferencia del transporte privado, los viajeros del transporte público tienen que adaptarse a los horarios y a las rutas que ofrezca el operador y dependen en mayor o menor medida de la intervención regulatoria del Gobierno.</p>
                        <a href="#" class="btn btn-success mt-50">Ver los servicios</a>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="features-thumbnail">
                        <img src="dist/img/bg-img/minibus.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Características del área final ***** -->

    <!-- ***** Inicio del área de pie de página ***** -->
    <footer class="footer-area section-padding-100">
        <!-- Area de pie de página principal -->
        <div class="main-footer-area">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area">
                            <div class="footer-logo">
                                <img src="dist/img/core-img/logo.png" alt="">
                            </div>
                            <p>El transporte público urbano puede ser proporcionado por una o varias empresas privadas o por consorcios de transporte público. Los servicios se mantienen mediante cobro directo a los pasajeros. Normalmente son servicios regulados y subvencionados por autoridades locales o nacionales.</p>
                            <div class="footer-social-info">
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area">
                            <div class="widget-title">
                                <h6>Eventos</h6>
                            </div>
                            <div class="widget-blog-post">
                                <!-- Publicación de blog individual -->
                                <div class="widget-single-blog-post d-flex">
                                    <div class="widget-post-thumbnail">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">Mejor servicio de transporte</a>
                                        <p>Dic 02, 2019</p>
                                    </div>
                                </div>
                                <!-- Publicación de blog individual -->
                                <div class="widget-single-blog-post d-flex">
                                    <div class="widget-post-thumbnail">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">Se prueba nuevos vehiculos</a>
                                        <p>Ene 02, 2020</p>
                                    </div>
                                </div>
                                <!-- Publicación de blog individual -->
                                <div class="widget-single-blog-post d-flex">
                                    <div class="widget-post-thumbnail">
                                    </div>
                                    <div class="widget-post-content">
                                        <a href="#">Asesoramiento del sindicato</a>
                                        <p>Dic 02, 2019</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area">
                            <div class="widget-title">
                                <h6>Formulario de contactos</h6>
                            </div>
                            <div class="footer-contact-form">
                                <form action="#" method="post">
                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0" name="footer-name" id="footer-name" placeholder="NOmbre">
                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0" name="footer-email" id="footer-email" placeholder="E-mail">
                                    <textarea name="message" class="form-control border-top-0 border-right-0 border-left-0" id="footerMessage" placeholder="Mensaje"></textarea>
                                    <button type="submit" class="btn medilife-btn">Contactanos <span>+</span></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area">
                            <div class="widget-title">
                                <h6>Boletin Informativo</h6>
                            </div>

                            <div class="footer-newsletter-area">
                                <form action="#">
                                    <input type="email" class="form-control border-0 mb-0" name="newsletterEmail" id="newsletterEmail" placeholder="Su correo electronico">
                                    <button type="submit">Suscribirse</button>
                                </form>
                                <p>El transporte público accesible indica las características que deben tener los colectivos para ser accesibles para personas con discapacidad, y algunas de sus características son: que tengan puertas para subir o bajar que permitan el ingreso de una silla de ruedas, que tengan asientos reservados para personas con discapacidad, que permitan que las personas con discapacidad suban o bajen del colectivo por cualquiera de las puertas y que tengan espacios para ubicar los elementos que la persona con discapacidad usa para trasladarse.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Área de pie de página inferior -->
        <div class="bottom-footer-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="bottom-footer-content">
                            <!-- Texto de copyright -->
                            <div class="copywrite-text">
                                <p><!-- El enlace a Colorlib no se puede eliminar. La plantilla está licenciada bajo CC BY 3.0. -->
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | 
                                    Esta plantilla está hecha con <i class="fa fa-heart-o" aria-hidden="true"></i> por <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- El enlace a Colorlib no se puede eliminar. La plantilla está licenciada bajo CC BY 3.0. -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Fin de área de pie de página ***** -->

    <script src="{{asset('dist/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('dist/js/popper.min.js')}}"></script>
    <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/plugins.js')}}"></script>
    <script src="{{asset('dist/js/active.js')}}"></script>

</body>

</html>