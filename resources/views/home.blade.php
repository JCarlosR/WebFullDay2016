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
    <h3>Bienvenido {{ auth()->user()->name }} !</h3>
    <p>Si tienes alguna duda usa el formulario de contacto.</p>
@endsection