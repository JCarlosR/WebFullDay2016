@extends('layouts.panel')

@section('title','Certificados')

@section('inscription','open')

@section('payment','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Evento</a>
    </li>
    <li class="active">Pagos</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Gestionar pagos del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando pagos de los certificados
            </small>
        </h1>

    </div>

    <div class="row">
        <div class="col-xs-12">
            <h3><strong>Cuenta BANCO XXD:</strong>57032589035070</h3>
        </div>
        <br><br><br>
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Concepto de pago</th>
                        <th>Estado</th>
                        <th>Costo</th>
                        <th>Cantidad abonada</th>
                        <th>Fecha solicitud</th>
                        <th>Fecha último pago</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $array_solicitudes as $array_solicitude )
                        <tr>
                            <td>Certificado {{ $array_solicitude[0]->certificate->type }}</td>
                            <td>{{ $array_solicitude[0]->state }}</td>
                            <td>{{ $array_solicitude[0]->certificate->cost }}</td>
                            <td>S/. {{ $array_solicitude[1] }}</td>
                            <td>{{ $array_solicitude[2]}}</td>
                            <td>{{ $array_solicitude[3] }}</td>
                            <td>
                                @if( $array_solicitude[5]==1 )
                                    <a class="btn btn-sm btn-warning" href="{{ url('pagos/'.$array_solicitude[0]->id) }}"> Historial de pagos</a>
                                @elseif( $array_solicitude[4]==0 )
                                    <a class="btn btn-sm btn-info" href="{{ url('pagos/'.$array_solicitude[0]->id) }}"> Registrar pago</a>
                                    <button class="btn btn-sm btn-danger" data-delete="{{ $array_solicitude[0]->id }}"
                                            data-name="{{ $array_solicitude[0]->certificate->type }}"
                                            data-event="{{ $array_solicitude[0]->certificate->event->organization }}"> Anular
                                    </button>
                                @else
                                    <button class="btn btn-sm btn-danger" data-delete="{{ $array_solicitude[0]->id }}"
                                            data-name="{{ $array_solicitude[0]->certificate->type }}"
                                            data-event="{{ $array_solicitude[0]->certificate->event->organization }}"> Anular
                                    </button>
                               @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('modals')
    <div id="modalDocuments" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Vaucher</h4>
                </div>

                <div class="modal-body text-center">
                    <div id="documents"></div>
                </div>

                <div class="modal-footer">
                    <div class="text-center">
                        <button class="btn btn-sm btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-menu-up"></span> Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="modalDelete" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Anular suscripción de certificado</h4>
                </div>
                <form id="formDelete"  action="{{ url('certificados/eliminar') }}" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />
                        <div class="form-group">
                            <label id="null_message"></label>
                            <br>
                            <input type="text" readonly class="form-control" name="name"/>
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
    <script src="{{asset('assets/js/payment/show.js')}}"></script>
@endsection