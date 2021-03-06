<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="II Full Day UNT - Gestión de TI">
    <meta name="author" content="UNT">

    <title>II Full Day UNT – Gestión de TI</title>
    <meta property="og:image" content="{{ asset('images/fullday.jpg') }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="960">
    <meta property="og:image:height" content="350">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('plantilla/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Google Web Font -->
    <link href="{{ asset('plantilla/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>

    <!-- Custom CSS-->
    <link href="{{ asset('plantilla/css/general.css') }}" rel="stylesheet">

    <!-- Owl-Carousel -->
    <link href="{{ asset('plantilla/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('plantilla/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('plantilla/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('plantilla/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('plantilla/css/animate.css') }}" rel="stylesheet">

    <style>
        .logo {
            width: 100px;
            height: 53px;
        }
        .image {
            max-width: 315px;
            max-height: 315px;
            margin: 0 auto;
        }
        .mini-image {
            max-width: 150px;
            max-height: 150px;
            margin: 0 auto;
            border: 1px solid black;
        }
        ul.countdown {
            list-style: none;
            margin: 75px 0;
            padding: 0;
            display: block;
            text-align: center;
        }
        ul.countdown li {
            display: inline-block;
        }
        ul.countdown li span {
            font-size: 80px;
            font-weight: 300;
            line-height: 80px;
        }
        ul.countdown li.seperator {
            font-size: 80px;
            line-height: 70px;
            vertical-align: top;
        }
        ul.countdown li p {
            color: #a7abb1;
            font-size: 14px;
        }
        .timeline {
            position: relative;
            padding: 21px 0px 10px;
            margin-top: 4px;
            margin-bottom: 30px;
        }
        .timeline .line {
            position: absolute;
            width: 4px;
            display: block;
            background: currentColor;
            top: 0px;
            bottom: 0px;
            margin-left: 30px;
        }

        .timeline .separator {
            border-top: 1px solid currentColor;
            padding: 5px;
            padding-left: 40px;
            font-style: italic;
            font-size: .9em;
            margin-left: 30px;
        }
        .timeline .line::before { top: -4px; }
        .timeline .line::after { bottom: -4px; }
        .timeline .line::before,
        .timeline .line::after {
            content: '';
            position: absolute;
            left: -4px;
            width: 12px;
            height: 12px;
            display: block;
            border-radius: 50%;
            background: currentColor;
        }
        .timeline .panel {
            position: relative;
            margin: 10px 0px 21px 70px;
            clear: both;
        }
        .timeline .panel::before {
            position: absolute;
            display: block;
            top: 8px;
            left: -24px;
            content: '';
            width: 0px;
            height: 0px;
            border: inherit;
            border-width: 12px;
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-left-color: transparent;
        }
        .timeline .panel .panel-heading.icon * { font-size: 20px; vertical-align: middle; line-height: 40px; }
        .timeline .panel .panel-heading.icon {
            position: absolute;
            left: -59px;
            display: block;
            width: 40px;
            height: 40px;
            padding: 0px;
            border-radius: 50%;
            text-align: center;
            float: left;
        }
        .timeline .panel-outline {
            border-color: transparent;
            background: transparent;
            box-shadow: none;
        }
        .timeline .panel-outline .panel-body {
            padding: 10px 0px;
        }
        .timeline .panel-outline .panel-heading:not(.icon),
        .timeline .panel-outline .panel-footer {
            display: none;
        }
    </style>

    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="{{ asset('plantilla/css/magnific-popup.css') }}">

    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel='stylesheet' href='{{ asset('plantilla/css/dscountdown.css') }}' type='text/css' media='all' />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="dscountdown.js"></script> -->
    <script type="text/javascript" src="{{ asset('plantilla/js/dscountdown.min.js') }}"></script>
    <script>
        jQuery(document).ready(function($){

            $('.demo1').dsCountDown({
                endDate: new Date("November 26, 2016 08:00:00"),
                titleDays: 'Días',
                titleHours: 'Horas',
                titleMinutes: 'Minutos',
                titleSeconds: 'Segundos'
            });

        });
    </script>

    <script src="{{ asset('plantilla/js/modernizr-2.8.3.min.js') }}"></script>  <!-- Modernizr /-->
    <!--[if IE 9]>
    <script src="{{ asset('plantilla/js/PIE_IE9.js') }}"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="{{ asset('plantilla/js/PIE_IE678.js') }}"></script>
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="{{ asset('plantilla/js/html5shiv.js') }}"></script>
    <![endif]-->


</head>

<body id="home">

<!-- Preloader -->
<div id="preloader">
    <div id="status"></div>
</div>

<!-- FullScreen -->
<div class="intro-header">
    <div class="col-xs-12 text-center abcen1">
        <h2 class="h1_home wow fadeIn" data-wow-delay="0.4s"><img class="logo rotate" src="{{ asset('images/logo_solo.png') }}" alt="">II Full Day de Gestión de TI UNT</h2>

        <h3 class="h3_home wow fadeIn" data-wow-delay="0.6s">Tiempo restante</h3>
        <div class="demo1"></div>
        <br>
        <ul class="list-inline intro-social-buttons">
            @if(Auth::guest())
                <li><a href="{{ url('/login') }}" class="btn  btn-lg mybutton_cyano wow fadeIn" data-wow-delay="0.8s"><span class="network-name">Inicia sesión</span></a>
                </li>
                <li><a href="{{ url('/register') }}" class="btn  btn-lg mybutton_standard wow fadeIn" data-wow-delay="1.2s"><span class="network-name">Inscríbete ya!</span></a>
                </li>
            @else

                <li>
                    <a href="{{ url('/home') }}" class="btn  btn-lg mybutton_cyano wow fadeIn" data-wow-delay="0.8s">
                        <span class="network-name">Ir al panel</span>
                    </a>
                </li>
                <li><span class="network-name">Bienvenido {{ Auth::user()->name }}</span>
                </li>
            @endif
        </ul>
    </div>
    @if(!Auth::guest())
        <?php $mytime = Carbon\Carbon::now();
              $cmp = strcmp(substr((string)Auth::user()->created_at,0,-3),substr($mytime->toDateTimeString(),0,-3));
        ?>
        @if($cmp==0)
            <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Registro Exitoso!</strong> Revisa tu correo para confirmar.
            </div>
        @endif
    @endif
    <!-- /.container -->
    <div class="col-xs-12 text-center abcen wow fadeIn">
        <div class="button_down ">
            <a class="imgcircle wow bounceInUp" data-wow-duration="1.5s"  href="#whatis"> <img class="img_scroll" src="{{ asset('plantilla/img/icon/circle.png') }}" alt=""> </a>
        </div>
    </div>
</div>

<!-- NavBar-->
<nav class="navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#home">II Full Day</a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
            <ul class="nav navbar-nav">

                <li class="menuItem"><a href="#whatis">¿Qué es?</a></li>
                <li class="menuItem"><a href="#useit">Ponentes</a></li>
                <li class="menuItem"><a href="#screen">Ponencias</a></li>
                <li class="menuItem"><a href="#news">Novedades</a></li>
                <li class="menuItem"><a href="#credits">Itinerario</a></li>
                <li class="menuItem"><a href="#sponsors">Auspiciadores</a></li>
                <li class="menuItem"><a href="#contact">Contacto</a></li>
            </ul>
        </div>

    </div>
</nav>

<!-- What is -->
<div id="whatis" class="content-section-b" style="border-top: 0">
    <div class="container">

        <div class="col-md-6 col-md-offset-3 text-center wrap_title">
            <h2>Qué es?</h2>
            <p class="lead" style="margin-top:0">Ven este 26 de Noviembre y conoce diversos temas acerca de las TI en el negocio.</p>

        </div>

        <div class="row">

            <div class="col-sm-4 wow fadeInDown text-center">
                <a target="_blank" href="https://www.facebook.com/II-Full-Day-de-Gesti%C3%B3n-de-TI-188251811510916/?fref=nf"><img class="rotate" src="{{ asset('plantilla/img/icon/facebook.png') }}" alt=""></a>
                <a target="_blank" href="https://www.facebook.com/II-Full-Day-de-Gesti%C3%B3n-de-TI-188251811510916/?fref=nf"><h3>Síguenos</h3></a>
                <p class="lead">Síguenos y comparte nuestro fanpage en Facebook. </p>

                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

            <div class="col-sm-4 wow fadeInDown text-center">
                <a href="#contact"><img class="rotate" src="{{ asset('plantilla/img/icon/mail.svg') }}" alt="Generic placeholder image"></a>
                <a href="#contact"><h3>Contáctanos</h3></a>
                <p class="lead">Envía tus dudas o sugerencias, nosotros te responderemos lo más pronto posible.</p>
            </div><!-- /.col-lg-4 -->

            <div class="col-sm-4 wow fadeInDown text-center">
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.youtube.sorcjc.fullday2016"><img class="rotate" src="{{ asset('plantilla/img/icon/android.png') }}" alt=""></a>
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.youtube.sorcjc.fullday2016">
                    <h3>Aplicación Android</h3>
                </a>
                <p class="lead">Descarga nuestra app y vive una experiencia nueva de participar en una ponencia.</p>
            </div><!-- /.col-lg-4 -->

        </div><!-- /.row -->
    </div>
</div>

<!-- Use it -->
<div id ="useit" class="content-section-b">

    <div class="container">
        <div class="col-md-6 col-md-offset-3 text-center wrap_title">
            <h2>Ponentes</h2>
        </div>
        @foreach ($speakers as $speaker)
        <div class="row">

            <div class="col-sm-6 wow fadeInLeftBig">
                <img class="img-responsive img-rounded image" src="{{ asset('assets/images/') }}/{{ $speaker->image }}" alt="">
            </div>

            <div class="col-sm-6 wow fadeInRightBig" data-animation-delay="200">
                <h3 class="section-heading">{{ $speaker->name }}</h3>
                <div class="sub-title lead3">{{ $speaker->position }}<br> {{ $speaker->company }} </div>
                <p class="lead2">
                    {{ $speaker->description }}
                    <br>
                    <strong>Email:</strong>{{ $speaker->email }}
                </p>

                <p>
                    <a class="btn btn-embossed btn-primary" href="{{ $speaker->profile }}" target="_blank" role="button">Más información</a>
                </p>
            </div>

        </div>
        <hr>
        @endforeach

    </div>
    <!-- /.container -->
</div>

<!-- Screen shot -->
<div id="screen" class="content-section-b">
    <div class="container">
        <div class="col-md-6 col-md-offset-3 text-center wrap_title">
            <h2>Ponencias</h2>
        </div>
        <section class="col-xs-12 col-sm-6 col-md-12">
            @foreach( $papers as $paper )
                <article class="row">
                    <div class="col-xs-12 col-sm-4 col-md-2">
                        <img title="{{ $paper->speaker->name }}" class="img-circle mini-image" src="{{ asset('assets/images') }}/{{ $paper->speaker->image }}" alt="{{ $paper->speaker->name }}" />
                    </div>
                    <div class="hidden-xs col-md-3">
                        <ul class="meta-search">
                            <li><i class="glyphicon glyphicon-calendar"></i> <span>26 de Noviembre del 2016</span></li>
                            <li><i class="glyphicon glyphicon-tags"></i> <span>Ponencia</span></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-7">
                        <h3><a href="javascript:;" title="">{{ $paper->subject }}</a></h3>
                        <p>{{ $paper->description }}</p>
                        <p>Por {{ $paper->speaker->name }}</p>
                    </div>
                </article>
                <hr>
            @endforeach
        </section>
    </div>
</div>

<!-- News -->
<div id="news" class="content-section-b" style="border-top: 0">
    <div class="container">

        <div class="col-md-6 col-md-offset-3 text-center wrap_title">
            <h2>Novedades</h2>
            <p class="lead" style="margin-top:0">Aplicacion móvil para el Full Day de Gestión de TI UNT 2016.</p>

        </div>

        <div class="row">

            <div class="col-sm-6 col-sm-offset-3 wow fadeInDown text-center">
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.youtube.sorcjc.fullday2016">
                    <img class="rotate" src="{{ asset('plantilla/img/icon/android.png') }}" alt="Generic placeholder image">
                </a>
                <a target="_blank" href="https://play.google.com/store/apps/details?id=com.youtube.sorcjc.fullday2016">
                    <h3>Descargar Aplicación Android</h3>
                </a>
                <p class="lead">
                    ¡ Descarga ya y vive una mejor experiencia !
                </p>
                <a class="btn btn-primary" target="_blank" href="https://play.google.com/store/apps/details?id=com.youtube.sorcjc.fullday2016">Descargar</a>

                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

        </div><!-- /.row -->


    </div>
</div>

<!-- Credits -->
<div id="credits" class="content-section-a">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-3 text-center wrap_title">
                <h2>Itinerario</h2>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <div class="timeline">

                    <div class="line text-muted"></div>

                    @foreach( $itinerary as $data )

                            @if( $data->type == 1)
                                <article class="panel panel-info">
                                    <!-- Icon -->
                                    <div class="panel-heading icon">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </div>
                                    <!-- /Icon -->

                                    <!-- Body -->
                                    <div class="panel-body">
                                        <strong>REGISTRO</strong> {{ $data->description }}
                                    </div>
                                    <!-- /Body -->
                                    <!-- Icon -->
                                    <div class="panel-heading icon">
                                        <i class="glyphicon glyphicon-time"></i>
                                    </div>
                                    <!-- /Icon -->

                                    <!-- Body -->
                                    <div class="panel-body">
                                        <strong>Hora de inicio</strong> {{ date('h:i a', strtotime( $data->start ))}}
                                        <strong>Hora de fin</strong> {{ date('h:i a', strtotime( $data->end ))}}
                                    </div>
                                    <!-- /Body -->

                                </article>
                            @else
                                @if( $data->type == 2)
                                    <article class="panel panel-success">
                                        <!-- Icon -->
                                        <div class="panel-heading icon">
                                            <i class="glyphicon glyphicon-circle-arrow-right"></i>
                                        </div>
                                        <!-- /Icon -->

                                        <!-- Body -->
                                        <div class="panel-body">
                                            <strong>ACTIVIDAD</strong> {{ $data->description }}
                                        </div>
                                        <!-- /Body -->
                                        <!-- Icon -->
                                        <div class="panel-heading icon">
                                            <i class="glyphicon glyphicon-time"></i>
                                        </div>
                                        <!-- /Icon -->

                                        <!-- Body -->
                                        <div class="panel-body">
                                            <strong>Hora de inicio</strong> {{ date('h:i a', strtotime( $data->start ))}}
                                            <strong>Hora de fin</strong> {{ date('h:i a', strtotime( $data->end ))}}
                                        </div>
                                        <!-- /Body -->
                                    </article>
                                @else
                                    @if( $data->type == 4)
                                        <article class="panel panel-danger">
                                            <!-- Icon -->
                                            <div class="panel-heading icon">
                                                <i class="glyphicon glyphicon-transfer"></i>
                                            </div>
                                            <!-- /Icon -->

                                            <!-- Body -->
                                            <div class="panel-body">
                                                <strong>ACTIVIDAD</strong> {{ $data->description }}
                                            </div>
                                            <!-- /Body -->
                                            <!-- Icon -->
                                            <div class="panel-heading icon">
                                                <i class="glyphicon glyphicon-time"></i>
                                            </div>
                                            <!-- /Icon -->

                                            <!-- Body -->
                                            <div class="panel-body">
                                                <strong>Hora de inicio</strong> {{ date('h:i a', strtotime( $data->start ))}}
                                                <strong>Hora de fin</strong> {{ date('h:i a', strtotime( $data->end ))}}
                                            </div>
                                            <!-- /Body -->
                                        </article>
                                    @else
                                        <article class="panel panel-primary">
                                            <!-- Icon -->
                                            <div class="panel-heading icon">
                                                <i class="glyphicon glyphicon-book"></i>
                                            </div>
                                            <!-- /Icon -->

                                            <!-- Body -->
                                            <div class="panel-body">
                                                <strong>PONENCIA</strong> {{ $data->description }}
                                            </div>
                                            <!-- /Body -->
                                            <!-- Icon -->
                                            <div class="panel-heading icon">
                                                <i class="glyphicon glyphicon-time"></i>
                                            </div>
                                            <!-- /Icon -->

                                            <!-- Body -->
                                            <div class="panel-body">
                                                <strong>Hora de inicio</strong> {{ date('h:i a', strtotime( $data->start ))}}
                                                <strong>Hora de fin</strong> {{ date('h:i a', strtotime( $data->end ))}}
                                            </div>
                                            <!-- /Body -->
                                        </article>
                                @endif
                            @endif
                        @endif
                    @endforeach
                </div>
                <!-- /Panel -->
            </div>
        </div>
    </div>
</div>

<!-- Sponsors -->
<div id="sponsors" class="content-section-a">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-3 text-center wrap_title">
                <h2>Auspiciadores</h2>
                <p class="lead" style="margin-top:0">Un especial agradecimiento por su incondicional apoyo.</p>
            </div>

            <div class="col-sm-6  block wow bounceIn">
                <div class="row">
                    <div class="col-md-4 box-icon rotate">
                        <img src="{{ asset('assets/images/certipro64.png') }}" alt="" style="width: 100%; height: 100%">
                    </div>
                    <div class="col-md-8 box-ct">
                        <h3> Certipro64 </h3>
                        <p> <strong>Administrador:</strong> Ing. Nelson Angeles Quiñones. </p>
                        <p> <strong>Dirección:</strong> Av. América Norte 2062 - 2do. Piso Urb. Primavera </p>
                        <p> <strong>Teléfono:</strong> 044 - 201671 </p>
                        <p> <strong>Pagina web:</strong> <a href="http://www.certipro64.com"> www.certipro64.com</a> </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 block wow bounceIn">
                <div class="row">
                    <div class="col-md-4 box-icon rotate">
                        <img src="{{ asset('assets/images/devcodela.png') }}" alt="" style="width: 100%; height: 100%">
                    </div>
                    <div class="col-md-8 box-ct">
                        <h3> DevCode </h3>
                        <p> <strong>Administrador:</strong> Ing. Juan Jose Pino. </p>
                        <p> <strong>Dirección:</strong> Av. 9 de octubre 1305 Urb. Las Quintanas </p>
                        <p> <strong>Teléfono:</strong> 980654016 </p>
                        <p> <strong>Pagina web:</strong> <a href="https://devcode.la"> devcode.la</a> </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row tworow">
            <div class="col-sm-6  block wow bounceIn">
                <div class="row">
                    <div class="col-md-4 box-icon rotate">
                        <img src="{{ asset('assets/images/neptComputer.jpg') }}" alt="" style="width: 100%; height: 130%">
                    </div>
                    <div class="col-md-8 box-ct">
                        <h3> NeptComputer </h3>
                        <p> <strong>Administrador:</strong> Srta. Angela. </p>
                        <p> <strong>Dirección:</strong> Jr. Pizarro 201 </p>
                        <p> <strong>Teléfono:</strong> 965729483 </p>
                        <p> <strong>Pagina web:</strong> <a href="http://www.neptcomputer.com"> www.neptcomputer.com</a> </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 block wow bounceIn">
                <div class="row">
                    <div class="col-md-4 box-icon rotate">
                        <img src="{{ asset('assets/images/grafico.jpg') }}" alt="" style="width: 100%; height: 100%">
                    </div>
                    <div class="col-md-8 box-ct">
                        <h3> Matisse, Diseño & Producción Gráfica  </h3>
                        <p> <strong>Administrador:</strong> Alex Sandoval Sánchez. </p>
                        <p> <strong>Dirección:</strong> Jirón Bolívar, 942 </p>
                        <p> <strong>Teléfono:</strong> 044 - 295283 / RPM #948324848 / RPC 949340920 </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row tworow">
            <div class="col-sm-6 col-sm-offset-3  block wow bounceIn">
                <div class="row">
                    <div class="col-md-4 box-icon rotate">
                        <img src="{{ asset('assets/images/grafica bn.png') }}" alt="" style="width: 100%; height: 130%">
                    </div>
                    <div class="col-md-8 box-ct">
                        <h3> Gráfica B&N E.I.R.L </h3>
                        <p> <strong>Administrador:</strong> Alex Bailon Nassi. </p>
                        <p> <strong>Dirección:</strong> Av. España N 1534 </p>
                        <p> <strong>Teléfono:</strong> RPM #972979753 </p>
                        <p> <strong>Pagina web:</strong> <a href="https://www.facebook.com/graficabneirl/?fref=ts"> Gráfica B&N EIRL</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact -->
<div id="contact" class="content-section-a">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-3 text-center wrap_title">
                <h2>Contáctanos</h2>
            </div>

            <form role="form" id="form" method="post" >
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="InputName">Nombre: </label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" id="InputName" placeholder="Nombre completo" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="InputEmail">-Email: </label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="InputEmail" name="email" placeholder="E-mail" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="InputMessage">Mensaje: </label>
                        <div class="input-group">
                            <textarea name="mensaje" id="InputMessage" class="form-control" rows="5" required placeholder="¿Qué hay de nuevo?"></textarea>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>

                    <button id="send" class="btn btn-primary" data-url="{{ url('/contact') }}">Enviar correo</button>
                </div>
            </form>

            <hr class="featurette-divider hidden-lg">
            <div class="col-md-5 col-md-push-1 address">
                <address>
                    <h3>Ubicación del local</h3>
                    <p class="lead"><a title="Ubicación google maps" target="_blank" href="https://www.google.com/maps/place/Centro+de+Convenciones+Los+Conquistadores,+Jir%C3%B3n+Diego+De+Almagro,+Trujillo,+Per%C3%BA/@-8.1142808,-79.0300898,17z/data=!4m21!1m15!4m14!1m6!1m2!1s0x91ad3d8354648a39:0xf86dfb2dac3975be!2sLos+Conquistadores+Hotel+S+A,+Trujillo,+Per%C3%BA!2m2!1d-79.0280014!2d-8.1135887!1m6!1m2!1s0x91ad3d82f8bbaa63:0x24fe49ab04f05ae4!2sCentro+de+Convenciones+Los+Conquistadores,+Jir%C3%B3n+Diego+De+Almagro,+Trujillo,+Per%C3%BA,+Jir%C3%B3n+Bolivar+393,+Trujillo+13001,+Per%C3%BA!2m2!1d-79.0278328!2d-8.1137034!3m4!1s0x91ad3d82f8bbaa63:0x24fe49ab04f05ae4!8m2!3d-8.1137034!4d-79.0278328">Centro de Convenciones Los Libertadores<br>
                            Jr.Diego De Almagro 586 Trujillo Perú</a><br>
                    <h3>Comunícate sobre el evento al:</h3>
                        Teléfono RPC: 993 249 187<br>
                        Teléfono RPM: 949 610 531<br>

                </address>

                <h3>Social</h3>
                <li class="social">
                    <a target="_blank" href="https://www.facebook.com/II-Full-Day-de-Gesti%C3%B3n-de-TI-188251811510916/?fref=nf"><i class="fa fa-facebook-square fa-size"> </i></a>

                </li>
            </div>
        </div>
    </div>
</div>

<footer>

</footer>

<!-- JavaScript -->
<script src="{{ asset('plantilla/js/jquery-1.10.2.js') }}"></script>
<script src="{{ asset('plantilla/js/bootstrap.js') }}"></script>
<script src="{{ asset('plantilla/js/owl.carousel.js') }}"></script>
<script src="{{ asset('plantilla/js/script.js') }}"></script>
<!-- StikyMenu -->
<script src="{{ asset('plantilla/js/stickUp.min.js') }}"></script>
<script type="text/javascript">
    jQuery(function($) {
        $(document).ready( function() {
            $('.navbar-default').stickUp();

        });
    });

</script>
<!-- Smooth scroll -->
<script type="text/javascript" src="{{ asset('plantilla/js/jquery.corner.js') }}"></script>
<script src="{{ asset('plantilla/js/wow.min.js') }}"></script>
<script>
    new WOW().init();
</script>
<script src="{{ asset('plantilla/js/classie.js') }}"></script>
<script src="{{ asset('plantilla/js/uiMorphingButton_inflow.js') }}"></script>
<!-- Magnific Popup core JS file -->
<script src="{{ asset('plantilla/js/jquery.magnific-popup.js') }}"></script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
<script src="{{ asset('assets/js/welcome/main.js') }}"></script>
</body>

</html>
