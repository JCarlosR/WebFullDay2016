@extends('layouts.app')

@section('styles')
    <style>
        .espacio{
            padding-top: 6px;
            padding-bottom: 6px;
        }
    </style>
@endsection

@section('content')
    <div class="col-md-6 col-md-offset-3">
        <div id="signup-box" class="signup-box visible widget-box no-border">
            <div class="widget-body">
                <div class="widget-main">
                    <h4 class="header green lighter bigger">
                        <i class="ace-icon fa fa-users blue"></i>
                        Inscripción Gratuita
                    </h4>

                    <div class="space-6"></div>
                    <p> Ingresa tus datos para iniciar: </p>

                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label class="block clearfix{{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="block input-icon input-icon-right">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                                <i class="ace-icon fa fa-envelope"></i>
                            </span>
                                    </label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                    <label class="block clearfix{{ $errors->has('name') ? ' has-error' : '' }}">
                            <span class="block input-icon input-icon-right">
                                <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}"/>
                                <i class="ace-icon fa fa-user"></i>
                            </span>
                                    </label>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                                <!-- Nuevos parámetros   -->
                                        <label class="block clearfix{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <span class="block input-icon input-icon-right">
                                <input type="text" class="form-control" placeholder="Dni" name="dni" value="{{ old('dni') }}"/>
                                <i class="ace-icon fa fa-certificate"></i>
                            </span>
                                        </label>
                                        @if ($errors->has('dni'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('dni') }}</strong>
                                    </span>
                                        @endif
                                        <label class="block clearfix{{ $errors->has('celular') ? ' has-error' : '' }}">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control" placeholder="Celular" name="celular" value="{{ old('celular') }}"/>
                            <i class="ace-icon fa fa-mobile"></i>
                        </span>
                                        </label>
                                        @if ($errors->has('celular'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('celular') }}</strong>
                                </span>
                                        @endif

                                        <label class="block clearfix{{ $errors->has('universidad') ? ' has-error' : '' }}">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control" placeholder="Universidad" name="universidad" value="{{ old('universidad') }}"/>
                            <i class="ace-icon fa fa-university"></i>
                        </span>
                                        </label>
                                        @if ($errors->has('universidad'))
                                            <span class="help-block">
                                    <strong>{{ $errors->first('universidad') }}</strong>
                                </span>
                                        @endif
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label class="block clearfix{{ $errors->has('carrera') ? ' has-error' : '' }}">
                        <span class="block input-icon input-icon-right">
                            <input type="text" class="form-control" placeholder="Carrera" name="carrera" value="{{ old('carrera') }}"/>
                            <i class="ace-icon fa fa-key"></i>
                        </span>
                                    </label>
                                    @if ($errors->has('carrera'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('carrera') }}</strong>
                                </span>
                                    @endif

                                    <label class="block espacio">
                                        <input type="checkbox" class="ace" name="egresado" value="1"/>
                        <span class="lbl">
                            Egresado
                        </span>
                                    </label>


                                    <label class="block clearfix">
                        <span class="block input-icon input-icon-right">
                            <select class="form-control" name="ciclo">
                                <option value="0" @if (old('ciclo') == 0) selected @endif>Seleccione</option>
                                <option value="1" @if (old('ciclo') == 1) selected @endif>I</option>
                                <option value="2" @if (old('ciclo') == 2) selected @endif>II</option>
                                <option value="3" @if (old('ciclo') == 3) selected @endif>III</option>
                                <option value="4" @if (old('ciclo') == 4) selected @endif>IV</option>
                                <option value="5" @if (old('ciclo') == 5) selected @endif>V</option>
                                <option value="6" @if (old('ciclo') == 6) selected @endif>VI</option>
                                <option value="7" @if (old('ciclo') == 7) selected @endif>VII</option>
                                <option value="8" @if (old('ciclo') == 8) selected @endif>VIII</option>
                                <option value="9" @if (old('ciclo') == 9) selected @endif>IX</option>
                                <option value="10" @if (old('ciclo') == 10) selected @endif>X</option>
                            </select>
                        </span>
                                    </label>
                                    @if ($errors->has('ciclo'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('ciclo') }}</strong>
                                </span>
                                        @endif

                                                <!-- Fin Nuevos parámetros   -->
                                        <label class="block clearfix{{ $errors->has('password') ? ' has-error' : '' }}">
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

                                        <label class="block clearfix{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
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

                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="space-20"></div>
                        <span class="help-block">
                             <strong>(*) Se usará su email para inicio de sesión.</strong>
                        </span>
                            <fieldset>
                                <div class="clearfix">
                                    <button type="reset" class="width-30 pull-left btn btn-sm">
                                        <i class="ace-icon fa fa-refresh"></i>
                                        <span class="bigger-110">Limpiar</span>
                                    </button>

                                    <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                                        <span class="bigger-110">Registrar</span>

                                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                    </button>
                                </div>
                            </fieldset>
                        </div>


                    </form>
                </div>

                <div class="toolbar center">
                    <a href="{{url('/login')}}">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        Regresar a iniciar sesión
                    </a>
                </div>
            </div><!-- /.widget-body -->
        </div><!-- /.signup-box -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $("input[name='egresado']").change(function() {
            if(this.checked)
            {
                $("select[name='ciclo']").val('0');
                $("select[name='ciclo']").prop('disabled', true);
            }
            else
                $("select[name='ciclo']").prop('disabled', false);
        });
    </script>
@endsection