@extends('layouts.panel')

@section('title','Encuesta turno mañana')

@section('survey','open')
@section('survey-man','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Encuesta del evento</a>
    </li>
    <li class="active">Turno mañana</li>
@endsection

@section('content')
<div class="page-header">
        <h1>
            Encuesta del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando encuesta del turno mañana
            </small>
        </h1>
</div>
<div class="row">
    <div class="col-lg-12">
        <form action="{{ url('/survey/registrar/mañana') }}" method="POST" class="form-horizontal style-form">
            {{ csrf_field() }}
        <?php $j=1; ?> 
        @foreach( $questions as $data1 )
            @if( $data1->id == 1)
                <h5><i class="glyphicon glyphicon-hand-right"></i>&nbsp;El CIO ¿Cómo dar el salto al nivel estratégico del negocio? - Javier Quevedo</h5>    
            @endif
            @if( $data1->id == 6)
                <h5><i class="glyphicon glyphicon-hand-right"></i>&nbsp;Transformación digital - Roberto Llanos Gallo</h5>    
            @endif
            @if( $data1->id == 11)
                 <h5><i class="glyphicon glyphicon-hand-right"></i>&nbsp;Gestión de proyectos en la nube - Mg. Karla Vanessa Barreto Stein</h5>   
            @endif
            @if( $data1->id == 16)
                <h5><i class="glyphicon glyphicon-hand-right"></i>&nbsp;Preguntas sobre el evento</h5>      
            @endif
            @if( $data1->type == 1)
                <div class="form-group">
                    <label class="col-lg-8"><p>&nbsp;&nbsp;&nbsp;&nbsp;{{$j}}. {{ $data1->description }}</p></label>
                    <div class="col-lg-4">
                        <select name="questions[]" id="questions" required class="form-control">
                            <option value=""></option>
                            <option value="Muy satisfecho">Muy satisfecho</option>
                            <option value="Satisfecho">Satisfecho</option>
                            <option value="Medianamente de acuerdo">Medianamente de acuerdo</option>
                            <option value="En desacuerdo">En desacuerdo</option>
                            <option value="Totalmente en desacuerdo">Totalmente en desacuerdo</option>
                        </select><br>
                    </div>
                </div>
            @else 
                <div class="form-group">
                    <label class="col-lg-8"><p>&nbsp;&nbsp;&nbsp;&nbsp;{{$j}}. {{ $data1->description }}</p></label>
                    <div class="col-lg-4">
                        <input required type="text" class="form-control" name="questions[]"><br>
                    </div>
                </div>
            @endif
            <?php $j=$j+1;?> 
        @endforeach
        <div align="center" class="form-group">
            <input type="submit" class="btn btn-success" value="Enviar Encuesta">
        </div>
        </form>
    </div>
</div>
@endsection
