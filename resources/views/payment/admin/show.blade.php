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
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Asistente</th>
                        <th>Email</th>
                        <th>Universidad</th>
                        <th>Carrera</th>
                        <th>Estado</th>
                        <th>Monto abonado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $array_solicitudes as $array_solicitud )
                        <tr>
                            <td>{{ $array_solicitud[0]->user->name }}</td>
                            <td>{{ $array_solicitud[0]->user->email }}</td>
                            <td>{{ $array_solicitud[0]->user->universidad }}</td>
                            <td>{{ $array_solicitud[0]->user->carrera }}</td>
                            <td>{{ $array_solicitud[0]->state }}</td>
                            <td>S/. {{ $array_solicitud[1] }}.00</td>
                            <td>
                                @if( $array_solicitud[2] == 'Pendiente' )
                                    <button class="btn btn-primary btn-sm" data-solicitude="{{ $array_solicitud[0]->id }}"
                                            data-certificate="{{ $array_solicitud[0]->certificate->type }}"
                                            data-assistant="{{ $array_solicitud[0]->user->name }}">Registrar pago</button>
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
    <div id="modalRegister" class="modal fade in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Registrar pago</h4>
                </div>

                <form id="formRegister" action="{{ url('admin/pagos/registrar') }}" class="form-horizontal form-label-left"  method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="solicitude_id" />

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Asistente</label>
                            <div class="col-md-8">
                                <input name="assistant" class="form-control inside" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Concepto</label>
                            <div class="col-md-8">
                                <input name="certificate" class="form-control inside" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Centro de pago<span class="required">*</span></label>
                            <div class="col-md-8">
                                <input id="entity" name="entity" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Monto<span class="required">*</span></label>
                            <div class="col-md-4">
                                <input type="number" min="1" step="1" id="amount" name="amount" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Vaucher</label>
                            <div class="col-md-8">
                                <input type="file" accept="image/*" id="payment_file" name="payment_file" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Número operación</label>
                            <div class="col-md-4">
                                <input type="number" min="1" step="1" id="operation" name="operation" class="form-control inside">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" for="name">Fecha de operación<span class="required">*</span></label>
                            <div class="col-md-4">
                                <input type="date" id="operation_date" name="operation_date" value="{{$today}}" class="form-control inside" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="text-center">
                                <button class="btn btn-sm btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                                <button type="submit" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Registrar pago</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/js/payment/admin/index.js')}}"></script>
@endsection