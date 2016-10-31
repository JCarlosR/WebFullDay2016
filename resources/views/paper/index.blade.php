@extends('layouts.panel')

@section('title','Ponencias')

@section('event','open')

@section('paper','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Evento</a>
    </li>
    <li class="active">Ponencias</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Lista de ponencias del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando las ponencias
            </small>
        </h1>
    </div>

    <div class="space-6"></div>

    <div class="row">
        <div class="col-xs-12">

            <div class="space-4"></div>

        </div><!-- /.span -->
    </div><!-- /.row -->
@endsection