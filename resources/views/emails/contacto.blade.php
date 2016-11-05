@extends('layouts.panel')

@section('styles')

@endsection

@section('title','Contacto')

@section('contact','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Contáctanos</a>
    </li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Contáctanos
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Envíanos un correo para comunicarnos contigo
            </small>
        </h1>
    </div>

    <div class="space-6"></div>

    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form role="form" id="form" method="post"  >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Nombre</label>
                                <input type="text" class="form-control" id="name" placeholder="Ingrese su nombre" name="name" required="required" value="{{ $nameUser }}" />
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Correo electrónico</label>
                                <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                    <input type="email" class="form-control" id="email" placeholder="Ingrese su email" name="email" required="required" value="{{ $emailUser }}" /></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Mensaje</label>
                            <textarea name="mensaje" id="message" class="form-control" rows="9" cols="25" required="required"
                                      placeholder="Mensaje"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button data-url="{{ url('/contact') }}" class="btn btn-primary pull-right" id="send">
                                Enviar mensaje</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
                <legend><span class="glyphicon glyphicon-globe"></span> Ubicación del local</legend>
                <address>
                    <strong>Centro de Convenciones Los Libertadores</strong><br>
                    Jr.Diego De Almagro 586 Trujillo Peru<br>
                    <abbr title="Phone">
                        Teléfono RPC:</abbr>
                    993 249 187<br>
                    <abbr title="Phone">
                        Teléfono RPM:</abbr>
                    949 610 531
                </address>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/welcome/main.js') }}"></script>
@endsection