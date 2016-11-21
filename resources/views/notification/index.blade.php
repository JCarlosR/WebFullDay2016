@extends('layouts.panel')

@section('title','Notificaciones')

@section('manage-notification','open')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Notificaciones</a>
    </li>
    <li class="active">Envío de notificaciones</li>
@endsection

@section('content')
    <div class="col-md-10 col-md-offset-1">
        @if(isset($result))
            <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Envío Exitoso!</strong> Se ha enviado la notificacion a todos los usuarios.
            </div>
        @endif
        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/notification/enviar') }}" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="form-group">
                <label for="form-field-1"> Título </label>
                <input type="text" id="end-e" class="form-control" name="title" required/>
            </div>
            <div class="form-group">
                <label for="form-field-1"> Texto </label>
                <div>
                    <textarea id="message" class="form-control" name="message" rows="4" style="resize: none"></textarea>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-primary" id="btnEnviar">
                    <i class="ace-icon glyphicon glyphicon-send"></i>
                    Enviar
                </button>
            </div>
        </form>
    </div>
@endsection
