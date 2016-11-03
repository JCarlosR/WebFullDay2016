@extends('layouts.panel')

@section('title','Pagos')

@section('inscription','open')

@section('payment','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Evento</a>
    </li>
    <li class="active">Pagos</li>
@endsection

@section('styles')
    <style>
        .inside:focus{
            border: 1px solid #cf9018;
        }
        .img
        {
            height:400px;
            width:400px;
        }

    </style>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Lista de pagos del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando los pagos
            </small>
        </h1>
    </div>

    <div class="space-6"></div>

    <div class="row">
        <button class="btn btn-sm btn-success" data-register>Nuevo pago</button>
    </div><br>
    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Concepto de pago</th>
                        <th>Centro de pago</th>
                        <th>Número de operación</th>
                        <th>Fecha de operación</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $payments as $payment )
                        <tr>
                            <td>Certificado</td>
                            <td>{{ $payment->entity }}</td>
                            <td>{{ $payment->operation }}</td>
                            <td>{{ $payment->operation_date }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-document="{{ $payment->payment_file }}"> Vaucher</button>
                                <button class="btn btn-sm btn-danger" data-delete="{{$payment->id}}" data-operation="{{$payment->operation}}"
                                        data-entity="{{$payment->entity}}"> Anular
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
    <div id="modalRegister" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Registrar pago</h4>
                </div>

                <form id="formRegister" action="{{ url('pagos/registrar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                        <div class="form-group">
                            <label class="control-label col-md-4" for="name">Concepto</label>
                            <div class="col-md-7">
                                <input value="Certificado" class="form-control inside" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4" for="name">Centro de pago<span class="required">*</label>
                            <div class="col-md-7">
                                <input id="entity" name="entity" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4" for="name">Vaucher<span class="required">*</label>
                            <div class="col-md-7">
                                <input type="file" accept="image/*" id="payment_file" name="payment_file" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4" for="name">Número operación<span class="required">*</label>
                            <div class="col-md-7">
                                <input type="number" min="1" step="1" id="operation" name="operation" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4" for="name">Fecha de operación<span class="required">*</label>
                            <div class="col-md-7">
                                <input type="date" id="operation_date" name="operation_date" value="{{$today}}" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="text-center">
                                <button class="btn btn-sm btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                <button class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Registrar pago</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

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