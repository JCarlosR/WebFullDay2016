@extends('layouts.panel')

@section('title','Ponentes')

@section('event','open')

@section('speaker','active')

@section('styles')
    <style>
        .inside:focus{
            border: 1px solid #cf9018;
        }
        .no_resize
        {
            resize: none;
        }
        .img
        {
            height:400px;
            width:400px;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('assets/css/footable.bootstrap.min.css')  }}">
@endsection

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Evento</a>
    </li>
    <li class="active">Ponentes</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Historial de ponentes
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando los ponentes
            </small>
        </h1>
    </div>

    <div class="space-6"></div>
    <div class="row">
        <button class="btn btn-success btn-sm" data-register >Nuevo ponente</button>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class=''>
                <table class="table table-stripe mytable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Empresa</th>
                            <th data-hide="all" data-breakpoints="all" data-title="Cargo actual"></th>
                            <th data-hide="all" data-breakpoints="all" data-title="Descripción"></th>
                            <th data-type="html">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($speakers as $speaker )
                        <tr>
                            <td>{{ $speaker->name }}</td>
                            <td>{{ $speaker->email }}</td>
                            <td>{{ $speaker->company }}</td>
                            <td>{{ $speaker->position }}</td>
                            <td>{{ $speaker->description }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-show="{{ $speaker->id }}" data-image="{{ $speaker->image }}" data-name="{{ $speaker->name }}" >Fotografía</button>
                                <button class="btn btn-warning btn-sm" data-edit="{{ $speaker->id }}" data-name="{{ $speaker->name }}" data-email="{{ $speaker->email }}"
                                    data-company="{{ $speaker->company }}" data-position="{{ $speaker->position }}" data-image="{{ $speaker->image }}"
                                    data-profile="{{ $speaker->profile }}" data-description="{{ $speaker->description }}">Editar
                                </button>
                                <button class="btn btn-danger btn-sm" data-delete="{{ $speaker->id }}" data-name="{{ $speaker->name }}">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $speakers->render() }}
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <div  id="modalRegister" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h4>Nuevo ponente</h4>
                    </div>
                </div>

                <form id="formRegister" action="{{ url('admin/ponentes/registrar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Nombre<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input name="name" id="name" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="company">Email<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="email" name="email" id="email" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="company">Empresa<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input name="company" id="company" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="position">Cargo actual<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input name="position" id="position" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="image">Fotografía<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="file" accept="image/*" id="payment_file" name="image" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Descripción<span class="required">*</span></label>
                            <div class="col-md-8">
                                <textarea id="entity" name="description"  id=description" class="form-control inside no_resize" required></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="text-center">
                                <button class="btn btn-sm btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Registrar ponente</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div  id="modalShowImage" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h4>Fotografía</h4>
                    </div>
                </div>

                <div class="modal-body">
                    <label for="name">¿Desea eliminar el siguiente ponente?</label>
                    <input type="text" name="name" class="form-control" readonly><br>

                    <div id="image" class="text-center"></div>
                </div>

                <div class="modal-footer">
                    <div class="text-center">
                        <button class="btn btn-sm btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div  id="modalEdit" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h4>Editar ponente</h4>
                    </div>
                </div>

                <form id="formEdit" action="{{ url('admin/ponentes/editar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />
                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Nombre<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input name="name" id="name" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="company">Email<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input type="email" name="email" id="email" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="company">Empresa<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input name="company" id="company" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="position">Cargo actual<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input name="position" id="position" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="image">Fotografía</label>
                            <div class="col-md-8">
                                <input type="file" accept="image/*" id="payment_file" name="image" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Descripción<span class="required">*</span></label>
                            <div class="col-md-8">
                                <textarea name="description"  id=description" class="form-control inside no_resize" required></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="text-center">
                                <button class="btn btn-sm btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Guardar cambios</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div  id="modalDelete" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h4>Nuevo ponente</h4>
                    </div>
                </div>

                <form id="formDelete" action="{{ url('admin/ponentes/eliminar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" id="id">

                        <label>¿Desela eliminar el siguiente ponente?</label>
                        <input name="name" id="name" class="form-control inside" readonly><br>

                        <div class="modal-footer">
                            <div class="text-center">
                                <button class="btn btn-sm btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Eliminar ponente</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script src="{{ asset('assets/js/footable.min.js') }}"></script>
    <script src="{{ asset('assets/js/speaker/adminShow.js') }}"></script>
@endsection
