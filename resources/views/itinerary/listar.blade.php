@extends('layouts.panel')

@section('styles')

@endsection

@section('title','Itinerario')

@section('manage-event','open')

@section('manage-itinerary','active')


@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Evento</a>
    </li>
    <li class="active">Itinerario</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Itinerario del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando el itinerario
            </small>
        </h1>
    </div>

    <button id="new-itinerary" class="btn btn-success">
        <i class="ace-icon glyphicon glyphicon-plus"></i>
        Nueva actividad
    </button>
    <div class="space-6"></div>

    <div class="row">
        <div class="col-xs-12">
            <div class="space-4"></div>

            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center">N°</th>
                    <th class="center">Tipo</th>
                    <th class="center">Descripcion</th>
                    <th class="hidden-480 center">Hora de inicio</th>
                    <th class="hidden-480 center">Hora de término</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach( $itineraries as $itinerary )
                    <tr>
                        <td class="center">{{ $itinerary->id }}</td>
                        <td class="center">{{ $itinerary->type }}</td>
                        <td class="center">{{ $itinerary->description }}</td>
                        <td class="hidden-480 center">{{ date('h:i a', strtotime( $itinerary->start ))}}</td>
                        <td class="hidden-480 center">{{ date('h:i a', strtotime( $itinerary->end ))}}</td>

                        <td class="center">
                            <div class="hidden-sm hidden-xs btn-group">
                                <button data-edit data-id="{{$itinerary->id}}" data-type="{{$itinerary->type}}" data-description="{{$itinerary->description}}" data-start="{{$itinerary->start}}" data-end="{{$itinerary->end}}" class="btn btn-xs btn-info">
                                    <i class="ace-icon glyphicon glyphicon-pencil bigger-120"></i>
                                </button>
                                <button class="btn btn-xs btn-danger" data-delete data-id="{{ $itinerary->id }}" data-description="{{$itinerary->description}}">
                                    <i class="ace-icon fa fa-trash bigger-120"></i>
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
                    <h3 class="smaller lighter blue no-margin">Nueva Actividad</h3>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="form-new">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipo Actividad </label>
                            <div class="col-sm-8">
                                <select class="form-control" id="types" name="type">
                                    <option value="1">Registro</option>
                                    <option value="2">Inicio - Cierre</option>
                                    <option value="4">Intermedia</option>
                                    <option value="3">Ponencia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Descripcion </label>
                            <div class="col-sm-8">
                                <textarea id="subject" class="form-control" name="description" rows="4" style="resize: none"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hora de inicio </label>
                            <div class="col-sm-4">
                                <input type="time" id="start" class="form-control" name="start" value="08:00" max="16:00" min="08:00" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hora de término </label>
                            <div class="col-sm-4">
                                <input type="time" id="end" class="form-control" name="end" value="08:00" max="16:00" min="08:00" required/>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary pull-left" id="btnSave" data-url="{{ url('admin/itinerario/registrar') }}">
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
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tipo Actividad </label>
                            <div class="col-sm-8">
                                <select class="form-control" id="type-e" name="type-e">
                                    <option value="1">Registro</option>
                                    <option value="2">Inicio - Cierre</option>
                                    <option value="4">Intermedia</option>
                                    <option value="3">Ponencia</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Descripcion </label>
                            <div class="col-sm-8">
                                <textarea id="description-e" class="form-control" name="description-e" rows="4" style="resize: none"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hora de inicio </label>
                            <div class="col-sm-4">
                                <input type="time" id="start-e" class="form-control" name="start-e" value="08:00" max="16:00" min="08:00" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Hora de término </label>
                            <div class="col-sm-4">
                                <input type="time" id="end-e" class="form-control" name="end-e" value="08:00" max="16:00" min="08:00" required/>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="modal-footer">
                    <button data-url="{{url('admin/itinerario/editar')}}" class="btn btn-sm btn-primary pull-left" id="btnEditar">
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

    <div id="delete-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="smaller lighter blue no-margin">Eliminar ponencia</h3>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="form-delete" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <strong>¿Está seguro de eliminar esta actividad?</strong>

                        <input id="idEliminado" type="hidden" name="id-d">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nombre Actividad </label>
                            <div class="col-sm-8">
                                <textarea id="description-d" class="form-control" name="description-d" rows="4" readonly></textarea>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary pull-left" id="btnEliminar" data-url="{{url('admin/itinerario/eliminar')}}">
                        <i class="ace-icon glyphicon glyphicon-trash"></i>
                        Eliminar
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
    <script src="{{ asset('assets/js/record/itinerary.js') }}"></script>
@endsection