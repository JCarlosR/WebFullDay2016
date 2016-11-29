@extends('layouts.panel')

@section('title','Encuesta del evento')

@section('survey','open')
@section('survey','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Encuesta del evento</a>
    </li>
    <li class="active">Turno</li>
@endsection

@section('content')
<div class="page-header">
        <h1>
            Encuesta del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando encuesta del turno
            </small>
        </h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-danger">
            <strong>Información! </strong>Ya envio la encuesta de este turno, gracias.
        </div>
   </div>
</div>
@endsection
