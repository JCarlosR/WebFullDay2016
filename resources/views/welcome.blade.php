<!-- FlatFy Theme - Andrea Galanti /-->
<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Flatfy Free Flat and Responsive HTML5 Template ">
    <meta name="author" content="">

    <title>II Full Day – Gerencia de sistemas UNT</title>

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

        .image{
            width: 315px;
            height: 315px;
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
        <h2 class="h1_home wow fadeIn" data-wow-delay="0.4s"><img class="logo rotate" src="{{ asset('images/logo_solo.png') }}" alt="">II Full Day Gerencia UNT</h2>

        <h3 class="h3_home wow fadeIn" data-wow-delay="0.6s">Tiempo restante</h3>
        <div class="demo1"></div>
        <br>
        <ul class="list-inline intro-social-buttons">
            @if(Auth::guest())
                <li><a href="{{ url('/login') }}" class="btn  btn-lg mybutton_cyano wow fadeIn" data-wow-delay="0.8s"><span class="network-name">Iniciar sesión</span></a>
                </li>
                <li><a href="{{ url('/register') }}" class="btn  btn-lg mybutton_standard wow fadeIn" data-wow-delay="1.2s"><span class="network-name">Regístrate Ya!</span></a>
                </li>
            @else
                <li><a href="{{ url('/home') }}" class="btn  btn-lg mybutton_cyano wow fadeIn" data-wow-delay="0.8s"><span class="network-name">Ir a Principal</span></a>
                </li>
                <li><span class="network-name">Bienvenido {{ Auth::user()->name }}</span>
                </li>
            @endif
        </ul>
    </div>
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

                <li class="menuItem"><a href="#whatis">Qué es?</a></li>
                <li class="menuItem"><a href="#useit">Ponentes</a></li>
                <li class="menuItem"><a href="#screen">Ponencias</a></li>
                <li class="menuItem"><a href="#credits">Itinerario</a></li>
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
                <img class="rotate" src="{{ asset('plantilla/img/icon/facebook.png') }}" alt="Generic placeholder image">
                <a target="_blank" href="https://www.facebook.com/II-Full-Day-de-Gesti%C3%B3n-de-TI-188251811510916/?fref=nf"><h3>Síguenos</h3></a>
                <p class="lead">Síguenos y comparte nuestro fanpage en Facebook. </p>

                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

            <div class="col-sm-4 wow fadeInDown text-center">
                <img class="rotate" src="{{ asset('plantilla/img/icon/mail.svg') }}" alt="Generic placeholder image">
                <a href="#contact"><h3>Contáctanos</h3></a>
                <p class="lead">Envía tus dudas o sugerencias, nosotros te responderemos lo mas antes posible. </p>
                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
            </div><!-- /.col-lg-4 -->

            <div class="col-sm-4 wow fadeInDown text-center">
                <img  class="rotate" src="{{ asset('plantilla/img/icon/watch.svg') }}" alt="Generic placeholder image">
                <a href="#useit"><h3>Ponentes</h3></a>
                <p class="lead">Infórmate acerca de los ponentes, temas y actividades que se llevaran a cabo en el II Full Day de Gerencia UNT. </p>
                <!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
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
        @foreach( $speakers as $speaker )
            <div class="row">

            <div class="col-sm-6 pull-right wow fadeInRightBig">
                <img class="img-responsive image" src="{{ asset('assets/images/') }}/{{ $speaker->image }}" alt="">
            </div>

            <div class="col-sm-6 wow fadeInLeftBig"  data-animation-delay="200">
                <h3 class="section-heading">{{ $speaker->name }}</h3>
                <div class="sub-title lead3">{{ $speaker->position }}<br> {{ $speaker->company }} </div>
                <p class="lead">
                    {{ $speaker->description }}
                    <br>
                    <strong>Email:</strong>{{ $speaker->email }}
                </p>

                <p><a class="btn btn-embossed btn-primary" href="{{ $speaker->profile }}" role="button">Más información</a>
                    <a class="btn btn-embossed btn-info" href="#" role="button">Visit Website</a></p>
            </div>
        </div>
            <br>
            <br>
        @endforeach

    </div>
    <!-- /.container -->
</div>

<!-- Screenshot -->
<div id="screen" class="content-section-b">
    <div class="container">
        <div class="col-md-6 col-md-offset-3 text-center wrap_title">
            <h2>Ponencias</h2>
        </div>
        <section class="col-xs-12 col-sm-6 col-md-12">
            @foreach( $papers as $paper )
                <article class="search-result row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <a href="#" title="{{ $paper->speaker->name }}" class="thumbnail"><img class="image" src="{{ asset('assets/images') }}/{{ $paper->speaker->image }}" alt="{{ $paper->speaker->name }}" /></a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <ul class="meta-search">
                            <li><i class="glyphicon glyphicon-calendar"></i> <span>{{ date('jS F Y', strtotime($paper->realization)) }}</span></li>
                            <li><i class="glyphicon glyphicon-time"></i> <span>{{ $paper->start }}</span></li>
                            <li><i class="glyphicon glyphicon-tags"></i> <span>Ponencia</span></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                        <h3><a href="#" title="">{{ $paper->subject }}</a></h3>
                        <p>{{ $paper->description }}</p>
                        <p>Por {{ $paper->speaker->name }}</p>
                    </div>
                    <span class="clearfix borda"></span>
                </article>
                <div class="space-6"></div>
            @endforeach
        </section>
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

                <!-- Line component -->
                    <div class="line text-muted"></div>


                    @foreach( $itinerary as $data )
                        <!-- Separator -->
                            <div class="separator text-muted">
                                <time><i class="glyphicon glyphicon-calendar"></i> {{ date('jS F Y', strtotime($data->updated_at)) }}</time>
                            </div>
                            <!-- /Separator -->
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

<!-- Contact -->
<div id="contact" class="content-section-a">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-md-offset-3 text-center wrap_title">
                <h2>Contáctanos</h2>
            </div>

            <form role="form" action="" method="post" >
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="InputName">Your Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="InputEmail">Your Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="InputMessage">Message</label>
                        <div class="input-group">
                            <textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>

                    <input type="submit" name="submit" id="submit" value="Submit" class="btn wow tada btn-embossed btn-primary pull-right">
                </div>
            </form>

            <hr class="featurette-divider hidden-lg">
            <div class="col-md-5 col-md-push-1 address">
                <address>
                    <h3>Ubicación del local</h3>
                    <p class="lead"><a title="Ubicación google maps" target="_blank" href="https://www.google.com/maps/place/Los+Conquistadores+Hotel+S+A/@-8.1131851,-79.0291977,18z/data=!4m5!3m4!1s0x91ad3d8354648a39:0xf86dfb2dac3975be!8m2!3d-8.1135887!4d-79.0280014">Centro de Convenciones Los Libertadores<br>
                            Jr.Diego De Almagro 586 Trujillo Peru</a><br>
                        Phone: XXX-XXX-XXXX<br>
                        Fax: XXX-XXX-YYYY</p>
                </address>

                <h3>Social</h3>
                <li class="social">
                    <a target="_blank" href="https://www.facebook.com/II-Full-Day-de-Gesti%C3%B3n-de-TI-188251811510916/?fref=nf"><i class="fa fa-facebook-square fa-size"> </i></a>
                    <a href="#"><i class="fa fa-google-plus-square fa-size"> </i></a>
                </li>
            </div>
        </div>
    </div>
</div>



<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3 class="footer-title">Follow Me!</h3>
                <p>Vuoi ricevere news su altri template?<br/>
                    Visita Andrea Galanti.it e vedrai tutte le news riguardanti nuovi Theme!<br/>
                    Go to: <a  href="http://andreagalanti.it" target="_blank">andreagalanti.it</a>
                </p>

                <!-- LICENSE -->
                <a rel="cc:attributionURL" href="http://www.andreagalanti.it/flatfy"
                   property="dc:title">Flatfy Theme </a> by
                <a rel="dc:creator" href="http://www.andreagalanti.it"
                   property="cc:attributionName">Andrea Galanti</a>
                is licensed to the public under
                <BR>the <a rel="license"
                           href="http://creativecommons.org/licenses/by-nc/3.0/it/deed.it">Creative
                    Commons Attribution 3.0 License - NOT COMMERCIAL</a>.


            </div> <!-- /col-xs-7 -->

            <div class="col-md-5">
                <div class="footer-banner">
                    <h3 class="footer-title">Flatfy Theme</h3>
                    <ul>
                        <li>12 Column Grid Bootstrap</li>
                        <li>Form Contact</li>
                        <li>Drag Gallery</li>
                        <li>Full Responsive</li>
                        <li>Lorem Ipsum</li>
                    </ul>
                    Go to: <a href="http://andreagalanti.it/flatfy" target="_blank">andreagalanti.it/flatfy</a>
                </div>
            </div>
        </div>
    </div>
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
<!-- Smoothscroll -->
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
</body>

</html>
