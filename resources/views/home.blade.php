@extends('layouts.panel')

@section('title','Bienvenido')

@section('Home','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Inicio</a>
    </li>
    <li class="active">Bienvenido</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            II FULL DAY GESTION DE TI UNT
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Gestione su participación y certificados
            </small>
        </h1>
    </div>
    <div class="space-6"></div>

    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <h3>Bienvenido {{ auth()->user()->name }} !</h3>
            <p>Si tienes alguna interrogante no dudes en usar el formulario de contacto.</p>
            <img src="{{ asset('images/fullday.jpg') }}" alt="">
        </div>
    </div>
@endsection