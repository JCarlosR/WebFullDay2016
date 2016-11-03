@extends('layouts.panel')

@section('title','Pagos')

@section('inscription','open')

@section('payment','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Evento</a>
    </li>
    <li class="active">Certificados</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Lista de certificados del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando los certificados
            </small>
        </h1>
    </div>

    <div class="space-6"></div>

    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Concepto de pago</th>
                        <th>Estado</th>
                        <th>Fecha solicitud</th>
                        <th>Fecha pago</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $certificate_users as $certificate_user )
                        <tr>
                            <td>{{ $certificate_user->certificate->name }}</td>
                            <td>{{ $certificate_user->certificate->state }}</td>
                            <td>{{ $certificate_user->certificate->cost }}</td>
                            <td>{{ $certificate_user->certificate->solicitud->date }}</td>
                            <td>{{ $payment_date }}</td>
                            <td>
                                <a class="btn btn-sm btn-info" href="{{ url('pagos/'.$certificate_user->id) }}"> Registrar pago</a>
                                <button class="btn btn-sm btn-danger" data-delete="{{ $certificate_user->id }}"
                                        data-name="{{ $certificate_user->certificate->name }}"> Anular
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('modals')
    <div id="modalDocument" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Vaucher</h4>
                </div>

                <div class="modal-body text-center">
                    <div id="document"></div>
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
                    <h4 class="modal-title">Anular pago</h4>
                </div>
                <form id="formDelete"  action="{{ url('pagos/eliminar') }}" method="POST">
                    <div class="modal-body">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="id" />
                        <div class="form-group">
                            <label for="nombreEliminar">¿Desea anular el siguiente pago con los siguientes datos?</label>
                            <br>
                            Centro de pago
                            <input type="text" readonly class="form-control" name="entity"/>
                            Número de operación
                            <input type="text" readonly class="form-control" name="operation"/>
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
    <script src="{{asset('assets/js/payment/index.js')}}"></script>
@endsection