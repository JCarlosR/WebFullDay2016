@extends('layouts.panel')

@section('title','Certificados')

@section('manage-inscription','open')

@section('make-payment','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Inscripción</a>
    </li>
    <li class="active">Pagos</li>
@endsection

@section('content')
    <div id="path" data-path="{{ asset('/') }}"></div>
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
                        <th>Estado</th>
                        <th>Monto abonado</th>
                        <th>Concepto</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $array_solicitudes as $array_solicitud )
                        <tr>
                            <td>{{ $array_solicitud[0]->user->name }}</td>
                            <td>{{ $array_solicitud[0]->user->email }}</td>
                            <td>{{ $array_solicitud[0]->state }}</td>
                            <td>S/. {{ $array_solicitud[1] }}.00</td>
                            <td width="270">Certificado {{ $array_solicitud[0]->certificate->type }}</td>
                            <td>
                                @if(  $array_solicitud[0]->state  == 'Pendiente')
                                    <button class="btn btn-primary btn-sm" data-solicitude="{{ $array_solicitud[0]->id }}"
                                            data-certificate="{{ $array_solicitud[0]->certificate->type }}"
                                            data-assistant="{{ $array_solicitud[0]->user->name }}"><i class="ace-icon glyphicon glyphicon-plus-sign bigger-120"></i> Registrar pago</button>
                                    @if( $array_solicitud[1]!=0 )
                                        <button onClick="verifica({{ $array_solicitud[0]->id }},'{{ $array_solicitud[0]->certificate->type }}',0);" class="btn btn-warning btn-sm"><i class="ace-icon glyphicon glyphicon-check bigger-120"></i> Verificar pago</button>
                                    @endif
                                @endif
                                @if(  $array_solicitud[0]->state  == 'Pagado')
                                    <button onClick="verifica({{ $array_solicitud[0]->id }},'{{ $array_solicitud[0]->certificate->type }}',1);" class="btn btn-warning btn-sm"><i class="ace-icon glyphicon glyphicon-check bigger-120"></i> Verificar pago</button>
                                @endif
                                @if( $array_solicitud[0]->state == 'Verificado')
                                    <button onClick="verifica({{ $array_solicitud[0]->id }},'{{ $array_solicitud[0]->certificate->type }}',0);" class="btn btn-info btn-sm"><i class="ace-icon glyphicon glyphicon-share bigger-120"></i> Ver Pagos</button>
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
    <div class="modal fade" id="ModalVerifica">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Verificar Pagos</h4>
            </div>
        <form id="formularioVerificar" action="{{ url('admin/pagos/carga/') }}">
         {{ csrf_field() }}
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label col-md-2" for="name">Concepto de Pagos :</label>
                        <div class="col-md-9">
                             <input id="concept" class="form-control inside" readonly><br>
                        </div>
                     </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                        <div class="">
                            <table id="talaCategoria" class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th><i class="ace-icon glyphicon glyphicon-credit-card bigger-120"></i> Centro de Pago</th>
                                  <th><i class="ace-icon glyphicon glyphicon-pushpin bigger-120"></i> N° de Operacion </th>
                                  <th><i class="ace-icon glyphicon glyphicon-calendar bigger-120"></i> Fecha Operacion </th>
                                  <th><i class="ace-icon glyphicon glyphicon-usd bigger-120"></i> Monto </th>
                                  <th><i class="ace-icon fa fa-cogs bigger-120"></i> Accion </th>
                              </tr>
                              </thead>
                              <tbody id="cagaPagos">
                              </tbody>
                          </table>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                        <div class="">
                            <label for="name">Preview de Boucher : </label><br>
                            <img id="imageBoucher" src=""  width="270" height"300">
                        </div>
                     </div>
                  </div>
              </div>
            </div>
        </form>
        <form id="actualizaVerificar" action="{{ url('admin/pagos/verfica/') }}">
        {{ csrf_field() }}
            <div class="modal-footer">
              <div id="botton">
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