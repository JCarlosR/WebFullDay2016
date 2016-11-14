<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Full Day Gestión de TI | @yield('title')</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}" />


    <!-- text fonts -->
    <link rel="stylesheet" href="{{asset('assets/css/ace-fonts.css')}}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{asset('assets/css/ace.css')}}" class="ace-main-stylesheet" id="main-ace-style" />

    <!-- inline styles related to this page -->
    @yield('styles')
    <!-- ace settings handler -->
    <script src="{{ asset('assets/js/ace-extra.js')}}"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

</head>

<body class="no-skin">
<!-- #section:basics/navbar.layout -->
<div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
    </script>

    <div class="navbar-container" id="navbar-container">
        <!-- #section:basics/sidebar.mobile.toggle -->
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <!-- /section:basics/sidebar.mobile.toggle -->
        <div class="navbar-header pull-left">
            <!-- #section:basics/navbar.layout.brand -->
            <a href="#" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Full Day Gestión de TI
                </small>
            </a>

            <!-- /section:basics/navbar.layout.brand -->

            <!-- #section:basics/navbar.toggle -->

            <!-- /section:basics/navbar.toggle -->
        </div>

        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">

                <!-- #section:basics/navbar.user_menu -->
                @if (!Auth::guest())
                    <li class="light-blue">
                        <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="{{asset('assets/avatars/avatar2.png')}}" alt="Jason's Photo" />
								<span class="user-info">
									<small>Bienvenido,</small>
                                    {{ Auth::user()->name }}
								</span>

                            <i class="ace-icon fa fa-caret-down"></i>
                        </a>

                        <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                            <li>
                                <a href="{{ url('/datos') }}">
                                    <i class="ace-icon fa fa-user"></i>
                                    Mis datos
                                </a>
                            </li>

                            <li class="divider"></li>

                            <li>
                                <a href="{{ url('/logout') }}">
                                    <i class="ace-icon fa fa-power-off"></i>
                                    Cerrar sesión
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <!-- /section:basics/navbar.user_menu -->
            </ul>
        </div>

        <!-- /section:basics/navbar.dropdown -->
    </div><!-- /.navbar-container -->
</div>

<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar responsive">
        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
        </script>



        <ul class="nav nav-list">
            <li class="@yield('Home')">
                <a href="{{ url('/home') }}">
                    <i class="menu-icon fa fa-tachometer"></i>
                    <span class="menu-text">Inicio</span>
                </a>
                <b class="arrow"></b>
            </li>

            @if(Auth::user()->role_id == 3)

                <li class="@yield('event')">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								Información
							</span>
                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="@yield('paper')">
                            <a href="{{ url('/ponencias')}}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Ponencias
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="@yield('speaker')">
                            <a href="{{ url('/ponentes') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Ponentes
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="@yield('itinerarie')">
                            <a href="{{ url('/itinerario') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Itinerario
                            </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="@yield('inscription')">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-list"></i>
                        <span class="menu-text">Inscripción evento</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">
                        <li class="@yield('history')">
                            <a href="{{ url('/historial') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Historial
                            </a>
                        <li class="@yield('request')">
                            <a href="{{ url('/solicitudes') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Registro de certificados
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="@yield('payment')">
                            <a href="{{ url('/pagos') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Pagos de certificados
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>

                <li class="@yield('contact')">
                    <a href="{{ url('/contacto') }}">
                        <i class="menu-icon fa fa-picture-o"></i>
                        <span class="menu-text">Contacto</span>
                    </a>

                    <b class="arrow"></b>
                </li>

            @else
                <li class="@yield('manage-event')">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-globe"></i>
							<span class="menu-text">
								Gestionar evento
							</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">

                        <li class="@yield('manage-papers')">
                            <a href="{{ url('/papers') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gestionar ponencias
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="@yield('manage-speakers')">
                            <a href="{{ url('admin/ponentes') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gestionar ponentes
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="@yield('manage-itinerary')">
                            <a href="{{ url('admin/itinerario') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gestionar itinerario
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="@yield('manage-inscription')">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-calendar"></i>
							<span class="menu-text">
								Gestionar inscripción
							</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">

                        <li class="@yield('manage-record')">
                            <a href="{{ url('/record') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Historial
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="@yield('make-inscription')">
                            <a href="{{ url('/inscription') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Realizar inscripción
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="@yield('make-payment')">
                            <a href="{{ url('admin/pagos') }}">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Realizar pago
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="@yield('manage-payment')">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-usd"></i>
							<span class="menu-text">
								Gestionar pagos
							</span>
                    </a>

                </li>
                <li class="@yield('manage-assistance')">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-clock-o"></i>
							<span class="menu-text">
								Gestionar asistencia
							</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">

                        <li class="@yield('milestone')">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Gestionar hitos
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
                <li class="@yield('manage-admin')">
                    <a href="#" class="dropdown-toggle">
                        <i class="menu-icon fa fa-user"></i>
							<span class="menu-text">
								Gestionar admin
							</span>

                        <b class="arrow fa fa-angle-down"></b>
                    </a>

                    <b class="arrow"></b>

                    <ul class="submenu">

                        <li class="@yield('list-admin')">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Listar admin
                            </a>

                            <b class="arrow"></b>
                        </li>

                        <li class="@yield('make-admin')">
                            <a href="#">
                                <i class="menu-icon fa fa-caret-right"></i>
                                Crear admin
                            </a>

                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            @endif
        </ul><!-- /.nav-list -->

        <!-- #section:basics/sidebar.layout.minimize -->
        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>

        <!-- /section:basics/sidebar.layout.minimize -->
        <script type="text/javascript">
            try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
        </script>
    </div>

    <!-- /section:basics/sidebar -->
    <div class="main-content">
        <div class="main-content-inner">
            <!-- #section:basics/content.breadcrumbs -->
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
                </script>

                <ul class="breadcrumb">
                    @yield('menu-active')
                </ul><!-- /.breadcrumb -->

                <!-- /section:basics/content.searchbox -->
            </div>

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                @if (Auth::guest())
                                    <div class="col-md-6">
                                        <a href="{{ url('/login') }}" class="btn btn-primary btn-block">Login</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ url('/register') }}" class="btn btn-primary btn-block">Register</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!-- PAGE CONTENT BEGINS -->
                        @yield('content')
                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <div class="footer">
        <div class="footer-inner">
            <!-- #section:basics/footer -->
            <div class="footer-content">
                <span class="bigger-120">
                    II Full Day de Gestón de TI &copy; 2016
                    <span class="blue bolder">Comisión de Sistemas - UNT</span>
                </span>
            </div>

            <!-- /section:basics/footer -->
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

@yield('modals')

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='{{asset('assets/js/jquery.js')}}'>"+"<"+"/script>");
</script>

<!-- <![endif]-->

<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='../assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='../assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
</script>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>

<!-- page specific plugin scripts -->

<!-- ace scripts -->
<script src="{{asset('assets/js/ace/elements.scroller.js')}}"></script>
<script src="{{asset('assets/js/ace/elements.colorpicker.js')}}"></script>
<script src="{{asset('assets/js/ace/elements.fileinput.js')}}"></script>
<script src="{{asset('assets/js/ace/elements.typeahead.js')}}"></script>
<script src="{{asset('assets/js/ace/elements.wysiwyg.js')}}"></script>
<script src="{{asset('assets/js/ace/elements.spinner.js')}}"></script>
<script src="{{asset('assets/js/ace/elements.treeview.js')}}"></script>
<script src="{{asset('assets/js/ace/elements.wizard.js')}}"></script>
<script src="{{asset('assets/js/ace/elements.aside.js')}}"></script>
<script src="{{asset('assets/js/ace/ace.js')}}"></script>
<script src="{{asset('assets/js/ace/ace.ajax-content.js')}}"></script>
<script src="{{asset('assets/js/ace/ace.touch-drag.js')}}"></script>
<script src="{{asset('assets/js/ace/ace.sidebar.js')}}"></script>
<script src="{{asset('assets/js/ace/ace.sidebar-scroll-1.js')}}"></script>
<script src="{{asset('assets/js/ace/ace.submenu-hover.js')}}"></script>
<script src="{{asset('assets/js/ace/ace.widget-box.js')}}"></script>
<script src="{{asset('assets/js/ace/ace.settings.js')}}"></script>
<script src="{{asset('assets/js/ace/ace.settings-rtl.js')}}"></script>
<script src="{{asset('assets/js/ace/ace.settings-skin.js')}}"></script>
<script src="{{asset('assets/js/ace/ace.widget-on-reload.js')}}"></script>
<script src="{{asset('assets/js/ace/ace.searchbox-autocomplete.js')}}"></script>

<!-- inline scripts related to this page -->
@yield('scripts')
</body>
</html>
