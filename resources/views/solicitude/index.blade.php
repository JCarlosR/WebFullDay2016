@extends('layouts.panel')

@section('title','Bienvenido')

@section('inscription','open')

@section('request','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Inscripción</a>
    </li>
    <li class="active">Certificados</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Certificacion del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando certificación
            </small>
        </h1>
    </div>
<div class="col-md-8 col-md-offset-4">
<h3><b>CERTIFICACION DEL EVENTO</b></h3>
</div>
<div class="col-md-5 col-md-offset-1">
<h5><i class="glyphicon glyphicon-hand-right"></i> Registrar solicitud de certificados del evento</h5>
</div>
<div class="col-md-8 col-md-offset-2">
	<form action="{{ url('/solicitudes/registrar') }}" class="form-horizontal style-form" method="post" id="guardaform">
        {{ csrf_field() }}
         @foreach( $users as $data )
	          <div class="form-group">
	         		<label class="control-label"><b>Nombre del usuario:</b></label>
	          </div>
	          <div class="form-group">
	          		<input readonly type="text" class="form-control" id="{{ $data->id }}" name="txtNombre" value="{{ $data->name }}">
                <i><font color="red">* Importante: Recuerda que el nombre de usuario sera el mismo que aparezca en el certificado.</font></i>
                <font color="blue"><b><a href="{{ url('/datos') }}"> Editar Datos Click Aqui!</a></b></font>
	          		<input style="display:none" type="text" class="form-control" id="idusuario" name="idusuario" value="{{ $data->id }}">
	          </div>
         @endforeach
         <div class="form-group">
            <label class="control-label"><b>Evento:</b></label>
          </div>
         <?php $j=0; ?> 
         @foreach( $events as $data1 )
          <div class="form-group">
          		<input readonly type="text" class="form-control" id="{{ $data1->id }}" name="txtEvento" value="{{ $data1->organization }}">
          </div>
          <?php $i=0;?>
            @foreach( $certificates as $data2)
                @foreach( $solicitudes as $data3)
                    @if( $data3->certificate_id == $data2->id and $data3->state!='Anulado')
                        <?php $i=1;?>
                    @endif 
                @endforeach
                @if($i!=1)
                 <?php $j=1; ?>
                  <div class="form-group">
                       <label>Certificado de {{ $data2->type }} /<b><font SIZE=3 color="purple">Costo : S/.{{ $data2->cost }} </font></b><input type="checkbox"  name="certific[]" value="{{ $data2->id }}"></label>
                  </div>
                @endif
            <?php $i=0; ?>
            @endforeach
            @if($j==0)
              <div class="alert alert-danger">
                  <strong>Informacion! </strong>Ya solicito todos los certificados disponibles.
              </div>
              <div class="form-group">
                <a type="button" disabled id="btnGuard" onclick="sendform();" class="btn btn-success">Solicitar</a> 
              </div>
            @else
              <div class="form-group">
                <a type="button" id="btnGuard" onclick="sendform();" class="btn btn-success">Solicitar</a>
              </div>
            @endif
         @endforeach
    </form>
</div>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div class="alert alert-danger" role="alert" >
                <div><button type="button" class="close" data-dismiss="modal">&times;
               </button><strong>Alerta! </strong>Para solicitar un certificado debe Seleccionar al menos uno.
           		</div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/js/certificates/js.js')}}"></script>
@endsection