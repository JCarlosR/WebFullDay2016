@extends('layouts.panel')
@section('styles')
<style>
.timeline {
    position: relative;
    padding: 21px 0px 10px;
    margin-top: 4px;
    margin-bottom: 30px;
}

.timeline .line {
    position: absolute;
    width: 4px;
    display: block;
    background: currentColor;
    top: 0px;
    bottom: 0px;
    margin-left: 30px;
}

.timeline .separator {
    border-top: 1px solid currentColor;
    padding: 5px;
    padding-left: 40px;
    font-style: italic;
    font-size: .9em;
    margin-left: 30px;
}

.timeline .line::before { top: -4px; }
.timeline .line::after { bottom: -4px; }
.timeline .line::before,
.timeline .line::after {
    content: '';
    position: absolute;
    left: -4px;
    width: 12px;
    height: 12px;
    display: block;
    border-radius: 50%;
    background: currentColor;
}

.timeline .panel {
    position: relative;
    margin: 10px 0px 21px 70px;
    clear: both;
}

.timeline .panel::before {
    position: absolute;
    display: block;
    top: 8px;
    left: -24px;
    content: '';
    width: 0px;
    height: 0px;
    border: inherit;
    border-width: 12px;
    border-top-color: transparent;
    border-bottom-color: transparent;
    border-left-color: transparent;
}

.timeline .panel .panel-heading.icon * { font-size: 20px; vertical-align: middle; line-height: 40px; }
.timeline .panel .panel-heading.icon {
    position: absolute;
    left: -59px;
    display: block;
    width: 40px;
    height: 40px;
    padding: 0px;
    border-radius: 50%;
    text-align: center;
    float: left;
}

.timeline .panel-outline {
    border-color: transparent;
    background: transparent;
    box-shadow: none;
}

.timeline .panel-outline .panel-body {
    padding: 10px 0px;
}

.timeline .panel-outline .panel-heading:not(.icon),
.timeline .panel-outline .panel-footer {
    display: none;
}
</style>
@endsection


@section('title','Itinerario')

@section('Home','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Home</a>
    </li>
    <li class="active">Inicio</li>
@endsection

@section('content')
    <div class="timeline">
    
        <!-- Line component -->
        <div class="line text-muted"></div>

        <!-- Separator -->
        <div class="separator text-muted">
            <time><i class="glyphicon glyphicon-calendar"></i> 26/11/2016</time>
        </div>
        <!-- /Separator -->
    	@foreach( $itinerary as $data )
	        @if( $data->type == 1)
	        	<article class="panel panel-info">
	            <!-- Icon -->
		            <div class="panel-heading icon">
		                <i class="glyphicon glyphicon-pencil"></i>
		            </div>
		            <!-- /Icon -->
		    
		            <!-- Body -->
		            <div class="panel-body">
		                <strong>REGISTRO</strong> {{ $data->description }}
		            </div>
		            <!-- /Body -->
		            <!-- Icon -->
		            <div class="panel-heading icon">
		                <i class="glyphicon glyphicon-time"></i>
		            </div>
		            <!-- /Icon -->
		    
		            <!-- Body -->
		            <div class="panel-body">
		                <strong>Hora inicio</strong> {{ $data->start }}
		            </div>
		            <!-- /Body -->
		    
		        <!-- Icon -->
		            <div class="panel-heading icon">
		                <i class="glyphicon glyphicon-time"></i>
		            </div>
		            <!-- /Icon -->
		    
		            <!-- Body -->
		            <div class="panel-body">
		                <strong>Hora final</strong> {{ $data->end }}
		            </div>
	            <!-- /Body -->
	        	</article> 
	        @else
	        	@if( $data->type == 2)
	        		<article class="panel panel-success">
		            <!-- Icon -->
		            <div class="panel-heading icon">
		                <i class="glyphicon glyphicon-circle-arrow-right"></i>
		            </div>
		            <!-- /Icon -->
		    
		            <!-- Body -->
		            <div class="panel-body">
		                <strong>ACTIVIDAD</strong> {{ $data->description }}
		            </div>
		            <!-- /Body -->
		            <!-- Icon -->
		            <div class="panel-heading icon">
		                <i class="glyphicon glyphicon-time"></i>
		            </div>
		            <!-- /Icon -->
		    
		            <!-- Body -->
		            <div class="panel-body">
		                <strong>Hora inicio</strong> {{ $data->start }}
		            </div>
		            <!-- /Body -->
		    
		        <!-- Icon -->
		            <div class="panel-heading icon">
		                <i class="glyphicon glyphicon-time"></i>
		            </div>
		            <!-- /Icon -->
		    
		            <!-- Body -->
		            <div class="panel-body">
		                <strong>Hora final</strong> {{ $data->end }}
		            </div>
		            <!-- /Body -->
		        </article>
	        	@else
	        		@if( $data->type == 4)
	        			<article class="panel panel-danger">
				            <!-- Icon -->
				            <div class="panel-heading icon">
				                <i class="glyphicon glyphicon-transfer"></i>
				            </div>
				            <!-- /Icon -->
				    
				            <!-- Body -->
				            <div class="panel-body">
				                <strong>ACTIVIDAD</strong> {{ $data->description }}
				            </div>
				            <!-- /Body -->
				            <!-- Icon -->
				            <div class="panel-heading icon">
				                <i class="glyphicon glyphicon-time"></i>
				            </div>
				            <!-- /Icon -->
				    
				            <!-- Body -->
				            <div class="panel-body">
				                <strong>Hora inicio</strong> {{ $data->start }}
				            </div>
				            <!-- /Body -->
				    
				        <!-- Icon -->
				            <div class="panel-heading icon">
				                <i class="glyphicon glyphicon-time"></i>
				            </div>
				            <!-- /Icon -->
				    
				            <!-- Body -->
				            <div class="panel-body">
				                <strong>Hora final</strong> {{ $data->end }}
				            </div>
				            <!-- /Body -->
				        </article>
	        		@else
			        	<article class="panel panel-primary">
				            <!-- Icon -->
				            <div class="panel-heading icon">
				                <i class="glyphicon glyphicon-book"></i>
				            </div>
				            <!-- /Icon -->
				    
				            <!-- Body -->
				            <div class="panel-body">
				                <strong>PONENCIA</strong> {{ $data->description }}
				            </div>
				            <!-- /Body -->
				            <!-- Icon -->
				            <div class="panel-heading icon">
				                <i class="glyphicon glyphicon-time"></i>
				            </div>
				            <!-- /Icon -->
				    
				            <!-- Body -->
				            <div class="panel-body">
				                <strong>Hora inicio</strong> {{ $data->start }}
				            </div>
				            <!-- /Body -->
				    
				        <!-- Icon -->
				            <div class="panel-heading icon">
				                <i class="glyphicon glyphicon-time"></i>
				            </div>
				            <!-- /Icon -->
				    
				            <!-- Body -->
				            <div class="panel-body">
				                <strong>Hora final</strong> {{ $data->end }}
				            </div>
				            <!-- /Body -->
				        </article>
	        		@endif
	        	@endif
	        @endif
    	 @endforeach
        <!-- /Panel -->
    
    </div>
@endsection