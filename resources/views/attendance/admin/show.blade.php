@extends('layouts.panel')

@section('title','Asistencia')

@section('manage-assistance','open')

@section('milestone','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Asistencia</a>
    </li>
    <li class="active">Hitos</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Gestionar hitos del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando hitos de las asistencias
            </small>
        </h1>

    </div>

    <div class="row">
        <div class="col-xs-12">
            <button class="btn btn-success btn-sm" data-register><i class="ace-icon glyphicon glyphicon-plus-sign bigger-120"></i> Nuevo hito</button>
        </div>
    </div>
    <div class="space-4"></div>

    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Hito</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Acción</th>
                        <th>Pasar lista</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $milestones as $milestone )
                        <tr>
                            <td>{{ $milestone->name }}</td>
                            <td>{{ $milestone->date }}</td>
                            <td>{{ $milestone->time }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" data-delete="{{$milestone->id}}"
                                        data-name="{{$milestone->name}}"
                                        data-date="{{$milestone->date}}"
                                        data-time="{{$milestone->time}}"><i class="ace-icon glyphicon glyphicon-trash bigger-120"></i> Eliminar
                                </button>
                            </td>
                            <td><a href="{{url('admin/asistencias/'.$milestone->id)}}" class="btn btn-primary btn-sm"><i class="ace-icon glyphicon glyphicon-check bigger-120"></i> Pasar lista</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('modals')
    <div id="modalRegister" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Registrar hito</h4>
                </div>

                <form id="formRegister" action="{{ url('admin/hitos/registrar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Nombre<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input name="name" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Fecha<span class="required">*</span></label>
                            <div class="col-md-4">
                                <input type="date" name="date" class="form-control inside" value="{{$today}}"  required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Hora<span class="required">*</span></label>
                            <div class="col-md-4">
                                <input type="time" name="time" class="form-control inside" value="{{$time}}" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="text-center">
                                <button class="btn btn-sm btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Registrar hito</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="modalDelete" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Eliminar hito</h4>
                </div>

                <form id="formDelete"  action="{{ url('admin/hitos/eliminar') }}" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />

                        <label for="nombreEliminar">¿Está seguro que desea anular el siguiente hito?</label>

                        <div class="form-group">
                            Nombre:
                            <input type="text" class="form-control" name="name" readonly/>
                        </div>

                        <div class="form-group">
                            Fecha y hora:
                            <input type="text" class="form-control" name="date_time" readonly/>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="text-center">
                            <button class="btn btn-sm btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-menu-up"></span> Cancelar</button>
                            <button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Aceptar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/milestone/admin/show.js')}}"></script>
@endsection