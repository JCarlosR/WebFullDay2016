@extends('layouts.app')

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div id="login-box" class="login-box visible widget-box no-border">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header blue lighter bigger">
                        <i class="ace-icon fa fa-coffee green"></i>
                        Por favor ingresa tus datos
                    </h4>

                    <div class="space-6"></div>

                    <form role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                                <input type="text" class="form-control" placeholder="Email" name="email"/>
                                <i class="ace-icon fa fa-user"></i>
                            </span>
                            </label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif

                            <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                                <input type="password" class="form-control" placeholder="Password" name="password"/>
                                <i class="ace-icon fa fa-lock"></i>
                            </span>
                            </label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif

                            <div class="space"></div>

                            <div class="clearfix">
                                <div>
                                    <a href="{{url('password/reset')}}" style="color: orange">
                                        <i class="ace-icon fa fa-arrow-top"></i>
                                        Recuperar Contraseña
                                    </a>
                                </div>
                                <button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                    <i class="ace-icon fa fa-key"></i>
                                    <span class="bigger-110">Ingresar</span>
                                </button>
                            </div>

                            <div class="space-4"></div>
                        </fieldset>
                    </form>

                </div><!-- /.widget-main -->

                <div class="toolbar clearfix">
                    <div>
                        <a href="{{url('/')}}" style="color: white">
                            <i class="ace-icon fa fa-arrow-left"></i>
                            Volver al inicio
                        </a>
                    </div>

                    <div>
                        <a href="{{url('/register')}}" class="user-signup-link">
                            No te has registrado?
                            <i class="ace-icon fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div><!-- /.widget-body -->
        </div><!-- /.login-box -->


        <!--
            <div id="forgot-box" class="forgot-box widget-box no-border">
                <div class="widget-body">
                    <div class="widget-main">
                        <h4 class="header red lighter bigger">
                            <i class="ace-icon fa fa-key"></i>
                            Retrieve Password
                        </h4>

                        <div class="space-6"></div>
                        <p>
                            Enter your email and to receive instructions
                        </p>

                        <form>
                            <fieldset>
                                <label class="block clearfix">
                                                                <span class="block input-icon input-icon-right">
                                                                    <input type="email" class="form-control" placeholder="Email" />
                                                                    <i class="ace-icon fa fa-envelope"></i>
                                                                </span>
                                </label>

                                <div class="clearfix">
                                    <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                        <i class="ace-icon fa fa-lightbulb-o"></i>
                                        <span class="bigger-110">Send Me!</span>
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div><!-- /.widget-main

                    <div class="toolbar center">
                        <a href="#" data-target="#login-box" class="back-to-login-link">
                            Back to login
                            <i class="ace-icon fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div><!-- /.widget-body
            </div><!-- /.forgot-box

            -->
    </div>
@endsection
