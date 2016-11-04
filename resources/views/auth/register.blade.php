@extends('layouts.app')

@section('content')
    <div id="signup-box" class="signup-box visible widget-box no-border">
        <div class="widget-body">
            <div class="widget-main">
                <h4 class="header green lighter bigger">
                    <i class="ace-icon fa fa-users blue"></i>
                    New User Registration
                </h4>

                <div class="space-6"></div>
                <p> Enter your details to begin: </p>

                <form role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <fieldset>
                        <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                                <input type="email" class="form-control" placeholder="Email" name="email"/>
                                <i class="ace-icon fa fa-envelope"></i>
                            </span>
                        </label>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif

                        <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                                <input type="text" class="form-control" placeholder="Nombre" name="name"/>
                                <i class="ace-icon fa fa-user"></i>
                            </span>
                        </label>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                        <!-- Nuevos parámetros   -->
                        <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                                <input type="text" class="form-control" placeholder="Dni" name="dni"/>
                                <i class="ace-icon fa fa-certificate"></i>
                            </span>
                        </label>
                        @if ($errors->has('dni'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                        @endif
                        <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control" placeholder="Celular" name="celular"/>
                            <i class="ace-icon fa fa-mobile"></i>
                        </span>
                        </label>
                        @if ($errors->has('celular'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('celular') }}</strong>
                                </span>
                        @endif

                        <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control" placeholder="Universidad" name="universidad"/>
                            <i class="ace-icon fa fa-university"></i>
                        </span>
                        </label>
                        @if ($errors->has('universidad'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('universidad') }}</strong>
                                </span>
                        @endif


                        <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control" placeholder="Carrera" name="carrera"/>
                            <i class="ace-icon fa fa-key"></i>
                        </span>
                        </label>
                        @if ($errors->has('carrera'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('carrera') }}</strong>
                                </span>
                        @endif

                        <label class="block">
                            <input type="checkbox" class="ace" name="egresado" value="1"/>
                        <span class="lbl">
                            Egresado
                        </span>
                        </label>


                            <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <input type="number" class="form-control" placeholder="Ciclo" name="ciclo"/>
                            <i class="ace-icon fa fa-arrow-circle-up"></i>
                        </span>
                        </label>
                        @if ($errors->has('ciclo'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('ciclo') }}</strong>
                                </span>
                        @endif

                        <!-- Fin Nuevos parámetros   -->
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

                        <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                                <input type="password" class="form-control" placeholder="Repeat password" name="password_confirmation"/>
                                <i class="ace-icon fa fa-retweet"></i>
                            </span>
                        </label>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif

                                <div class="space-4"></div>
                                <span class="help-block">
                             <strong>(*) Se usará email para inicio de sesión.</strong>
                        </span>
                        <div class="space-20"></div>

                        <div class="clearfix">
                            <button type="reset" class="width-30 pull-left btn btn-sm">
                                <i class="ace-icon fa fa-refresh"></i>
                                <span class="bigger-110">Reset</span>
                            </button>

                            <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                                <span class="bigger-110">Register</span>

                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </button>
                        </div>
                    </fieldset>
                </form>
            </div>

            <div class="toolbar center">
                <a href="{{url('/login')}}">
                    <i class="ace-icon fa fa-arrow-left"></i>
                    Back to login
                </a>
            </div>
        </div><!-- /.widget-body -->
    </div><!-- /.signup-box -->
@endsection

@section('scripts')
    <script type="text/javascript">
        $("input[name='egresado']").change(function() {
            if(this.checked)
            {
                $("input[name='ciclo']").val('');
                $("input[name='ciclo']").prop('disabled', true);
            }
            else
                $("input[name='ciclo']").prop('disabled', false);
        });
    </script>
@endsection