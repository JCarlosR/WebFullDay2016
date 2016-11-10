@extends('layouts.panel')

@section('styles')

@endsection

@section('title','Usuarios')

@section('manage-inscription','open')

@section('manage-record','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Inscripciones</a>
    </li>
    <li class="active">Usuarios</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Lista de ponentes del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando los ponentes
            </small>
        </h1>
    </div>

    <div class="space-6"></div>

    <div class="row">
        <div class="col-xs-12">
            <a data-url="{{ url('/send') }}" class="btn btn-info" id="send">Enviar correos</a>
        </div><!-- /.span -->
    </div><!-- /.row -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/record/main.js') }}"></script>
@endsection