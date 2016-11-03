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
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
