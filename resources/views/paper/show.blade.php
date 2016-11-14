@extends('layouts.panel')

@section('styles')

@endsection

@section('title','Usuarios')

@section('manage-event','open')

@section('manage-papers','active')

@section('menu-active')
    <li xmlns="http://www.w3.org/1999/html">
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Evento</a>
    </li>
    <li class="active">Ponencias</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Lista de ponencias del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando las ponencias
            </small>
        </h1>
    </div>

    <button id="new-paper" class="btn btn-success">
        <i class="ace-icon glyphicon glyphicon-plus"></i>
        Nueva ponencia
    </button>
    <div class="space-6"></div>

    <div class="row">
        <div class="col-xs-12">
            <div class="space-4"></div>

            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center">Ponente</th>
                    <th class="center">Tema</th>
                    <th class="center">
                        <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                        Fecha de realización
                    </th>
                    <th class="hidden-480 center">Hora de inicio</th>
                    <th class="hidden-480 center">Hora de término</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach( $papers as $paper )
                    <tr>
                    <td class="center">{{ $paper->speaker->name }}</td>
                    <td class="center">{{ $paper->subject }}</td>
                    <td class="center">{{ date('jS F Y', strtotime($paper->realization)) }}</td>
                    <td class="hidden-480 center">{{ date('h:i a', strtotime( $paper->start )) }}</td>
                    <td class="hidden-480 center">{{ date('h:i a', strtotime( $paper->end )) }}</td>

                    <td class="center">
                        <div class="hidden-sm hidden-xs btn-group">
                            <button data-edit data-paper="{{$paper->id}}" data-speaker="{{$paper->speaker_id}}" data-subject="{{$paper->subject}}" data-date="{{$paper->realization}}" data-start="{{$paper->start}}" data-end="{{$paper->end}}" class="btn btn-xs btn-info">
                                <i class="ace-icon glyphicon glyphicon-pencil bigger-120"></i>
                            </button>
                            <button class="btn btn-xs btn-danger" data-delete data-paper="{{ $paper->subject }}" data-speaker="{{ $paper->speaker->name }}" data-id="{{ $paper->id }}">
                                <i class="ace-icon fa fa-trash bigger-120"></i>
                            </button>
                        </div>
                        <div class="hidden-md hidden-lg">
                            <div class="inline pos-rel">
                                <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                    <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                    <li>
                                        <a href="{{ url('#') }}" data-rel="tooltip" title="Edit">
                                            <span class="green">
                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete" data-delete data-paper="{{ $paper->subject }}" data-speaker="{{ $paper->speaker->name }}" data-id="{{ $paper->id }}">
                                            <span class="red">
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
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
                    <h3 class="smaller lighter blue no-margin">Nueva ponencia</h3>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="form-new">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ponente </label>
                            <div class="col-sm-8">
                                <select class="form-control" id="ponentes" name="ponentes">
                                    @foreach( $speakers as $speaker )
                                        <option value="{{ $speaker->id }}">{{ $speaker->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tema de ponencia </label>
                            <div class="col-sm-8">
                                <textarea id="subject" class="form-control" name="subject" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fecha </label>
                            <div class="col-sm-4">
                                <input type="date" id="date" class="form-control" name="date" value="{{ $date }}" required/>
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
                    <button class="btn btn-sm btn-primary pull-left" id="btnSave" data-url="{{ url('/papers/registrar') }}">
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
                    <h3 class="smaller lighter blue no-margin">Editar ponencia</h3>
                </div>

                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="form-edit" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="paper" />
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ponente </label>
                            <div class="col-sm-8">
                                <select class="form-control" id="speakers" name="speakers">
                                    @foreach( $speakers as $speaker )
                                        <option value="{{ $speaker->id }}">{{ $speaker->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tema de ponencia </label>
                            <div class="col-sm-8">
                                <textarea id="subject-e" class="form-control" name="subject-e" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Fecha </label>
                            <div class="col-sm-4">
                                <input type="date" id="date-e" class="form-control" name="date-e" required/>
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
                    <button data-url="{{url('/papers/editar')}}" class="btn btn-sm btn-primary pull-left" id="btnEditar">
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
                        <strong>¿Está seguro de eliminar esta ponencia?</strong>

                        <input id="idEliminado" type="hidden" name="idEliminado">
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ponente </label>
                            <div class="col-sm-8">
                                <input id="ponente-d" type="text" name="ponente-d" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tema de ponencia </label>
                            <div class="col-sm-8">
                                <textarea id="subject-d" class="form-control" name="subject-d" rows="4" readonly></textarea>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary pull-left" id="btnEliminar" data-url="{{url('/papers/eliminar')}}">
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
    <script src="{{ asset('assets/js/record/show.js') }}"></script>
@endsection