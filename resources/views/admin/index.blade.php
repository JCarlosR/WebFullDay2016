@extends('layouts.panel')

@section('styles')

@endsection

@section('title','Itinerario')

@section('manage-admin','open')

@section('list-admin','active')


@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Gestionar</a>
    </li>
    <li class="active">Administradores</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Administradores del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Lista de administradores
            </small>
        </h1>
    </div>

    <button id="new-admin" class="btn btn-success">
        <i class="ace-icon glyphicon glyphicon-plus"></i>
        Nuevo administrador
    </button>
    <div class="space-6"></div>

    <div class="row">
        <div class="col-xs-12">
            <div class="space-4"></div>

            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center">N°</th>
                    <th class="center">Nombre</th>
                    <th class="center">Email</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach( $usuarios as $usuario )
                    <tr>
                        <td class="center">{{ $usuario->id }}</td>
                        <td class="center">{{ $usuario->name }}</td>
                        <td class="center">{{ $usuario->email }}</td>

                        <td class="center">
                            <div class="hidden-sm hidden-xs btn-group">
                                <button data-edit data-id="{{$usuario->id}}" data-name="{{$usuario->name}}" data-email="{{$usuario->email}}" class="btn btn-xs btn-info">
                                    <i class="ace-icon glyphicon glyphicon-pencil bigger-120"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.span -->
    </div><!-- /.row -->

    <div id="new-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="smaller lighter blue no-margin">Nuevo Administrador</h3>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="form-new">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre </label>
                            <div class="col-sm-8">
                                <input type="text" id="name" class="form-control" name="name" value="" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
                            <div class="col-sm-8">
                                <input type="email" id="email" class="form-control" name="email" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password </label>
                            <div class="col-sm-8">
                                <input type="password" id="clave" class="form-control" name="clave" required/>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary pull-left" id="btnSave" data-url="{{ url('admin/registrar') }}">
                        <i class="ace-icon glyphicon glyphicon-trash"></i>
                        Guardar
                    </button>
                    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Cancelar
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div id="edit-modal" class="modal fade in" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="smaller lighter blue no-margin">Editar actividad</h3>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="form-edit" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id-e" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre </label>
                            <div class="col-sm-8">
                                <input type="text" id="name" class="form-control" name="name-e" value="" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>
                            <div class="col-sm-8">
                                <input type="email" id="email" class="form-control" name="email-e"/>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="modal-footer">
                    <button data-url="{{url('admin/editar')}}" class="btn btn-sm btn-primary pull-left" id="btnEditar">
                        <i class="ace-icon glyphicon glyphicon-trash"></i>
                        Editar
                    </button>
                    <button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Cancelar
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/admin/index.js') }}"></script>
@endsection