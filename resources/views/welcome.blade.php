@extends('layouts.panel')

@section('title','Bienvenido')

@section('Home','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Home</a>
    </li>
    <li class="active">Inicio</li>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content" align="center">
                    <br>
                    <h1>
                        II FULL DAY DE GESTIÓN DE TI 2016
                    </h1>
                    <h3>
                        Gerencia de Sistemas
                    </h3>
                    <img class="img-responsive" src="{{ asset('images/fullday.jpg') }}" alt="">
                </div>
                @if(!Auth::guest())
                <div class="space-20"></div>
                <div class="col-md-4 col-md-offset-8">
                    <span><b>Numero de Cuenta:</b> 123-123-124</span>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
