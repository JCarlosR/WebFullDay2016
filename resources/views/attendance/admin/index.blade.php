@extends('layouts.panel')

@section('title','Asistencia')

@section('manage-assistance','open')

@section('milestone','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Asistencia</a>
    </li>
    <li class="active">Asistencia</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Gestionar asistencias del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando asistentes
            </small>
        </h1>

    </div>

    <div class="col-md-5 pull-right">
        <div class="input-group">
            <input type="hidden" value="{{$id}}" id="milestone">
            <input type="number" min="0" class="form-control" placeholder="DNI del asistente ..." id ="search">
            <span class="input-group-btn">
                <button class="btn btn-primary btn-sm"><i class="ace-icon glyphicon glyphicon-search bigger-120"></i> Buscar</button>
            </span>
        </div>
    </div>
    <br><br><br>

    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped" id="data">
                <thead>
                    <tr>
                        <th>Asistente</th>
                        <th>Email</th>
                        <th>DNI</th>
                        <th>Celular</th>
                        <th>Universidad</th>
                        <th>Carrera</th>
                        <th>Asistencia</th>
                    </tr>
                </thead>
                <tbody id="attendances">

                </tbody>
            </table>
            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
        </div>
    </div>
    <div class="row text-center">
        <a href="{{ url('admin/hitos') }}" class="btn btn-danger btn-sm"><i class="ace-icon glyphicon glyphicon-backward bigger-120"></i> Volver</a>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('assets/js/milestone/pager.js')}}"></script>
    <script src="{{asset('assets/js/milestone/admin/index.js')}}"></script>
@endsection