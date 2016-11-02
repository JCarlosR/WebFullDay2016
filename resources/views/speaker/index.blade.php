@extends('layouts.panel')

@section('styles')
    <style>
        /* carousel */
        #quote-carousel
        {
            padding: 0 10px 30px 10px;
            margin-top: 30px;
        }

        /* Control buttons  */
        #quote-carousel .carousel-control
        {
            background: none;
            color: #222;
            font-size: 2.3em;
            text-shadow: none;
            margin-top: 30px;
        }
        /* Previous button  */
        #quote-carousel .carousel-control.left
        {
            left: -12px;
        }
        /* Next button  */
        #quote-carousel .carousel-control.right
        {
            right: -12px !important;
        }
        /* Changes the position of the indicators */
        #quote-carousel .carousel-indicators
        {
            right: 50%;
            bottom: 0px;
            margin-right: -19px;
        }
        /* Changes the color of the indicators */
        #quote-carousel .carousel-indicators li
        {
            background: #c0c0c0;
        }
        #quote-carousel .carousel-indicators .active
        {
            background: #333333;
        }
        #quote-carousel img
        {
            width: 250px;
            height: 100px
        }
        /* End carousel */

        .item blockquote {
            border-left: none;
            margin: 0;
        }

        .item blockquote img {
            margin-bottom: 10px;
        }
        .item blockquote p {
            font-size: 14px;
        }

    </style>
@endsection

@section('title','Ponencias')

@section('event','open')

@section('speaker','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Evento</a>
    </li>
    <li class="active">Ponentes</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Lista de ponentes del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando los ponentes
            </small>
        </h1>
    </div>

    <div class="space-6"></div>

    <div class="row">
        <div class="col-xs-12">
            <div class='col-md-offset-2 col-md-8'>
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <?php $i=0; ?>
                        @foreach( $speakers as $speaker )
                            @if( $i==0 )
                                <li data-target="#quote-carousel" data-slide-to="{{ $i }}" class="active"></li>
                            @else
                                <li data-target="#quote-carousel" data-slide-to="{{ $i }}"></li>
                            @endif
                            <?php $i++; ?>
                        @endforeach
                    </ol>

                    <!-- Carousel Slides / Quotes -->
                    <div class="carousel-inner">
                        <?php $y=0; ?>
                        @foreach( $speakers as $speaker )
                            @if( $y==0 )
                                <!-- Quote 1 -->
                                <div class="item active">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-3 text-center">
                                                <img class="img-circle" src="{{ asset('assets/images') }}/{{ $speaker->image }}" style="width: 100px;height:100px;">
                                                <!--<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;">-->
                                            </div>
                                            <div class="col-sm-9">
                                                <strong>Nombre: </strong><p>{{ $speaker->name }}</p>
                                                <strong>Compañia: </strong><p>{{ $speaker->company }}</p>
                                                <strong>Cargo actual:</strong><p>{{ $speaker->position }}</p>
                                                <strong>Email: </strong><p>{{ $speaker->email }}</p>
                                                <strong>Información: </strong><p>{{ $speaker->description }}</p>
                                                <small><a href="{{ $speaker->profile }}">Más información</a></small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                            @else
                                <!-- Quote 1 -->
                                <div class="item">
                                    <blockquote>
                                        <div class="row">
                                            <div class="col-sm-3 text-center">
                                                <img class="img-circle" src="{{ asset('assets/images') }}/{{ $speaker->image }}" style="width: 100px;height:100px;">
                                                <!--<img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/128.jpg" style="width: 100px;height:100px;">-->
                                            </div>
                                            <div class="col-sm-9">
                                                <strong>Nombre: </strong><p>{{ $speaker->name }}</p>
                                                <strong>Compañia: </strong><p>{{ $speaker->company }}</p>
                                                <strong>Cargo actual:</strong><p>{{ $speaker->position }}</p>
                                                <strong>Email: </strong><p>{{ $speaker->email }}</p>
                                                <strong>Información: </strong><p>{{ $speaker->description }}</p>
                                                <small><a href="{{ $speaker->profile }}">Más información</a></small>
                                            </div>
                                        </div>
                                    </blockquote>
                                </div>
                            @endif
                            <?php $y++; ?>
                        @endforeach

                    </div>

                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
            </div>
        </div><!-- /.span -->
    </div><!-- /.row -->
@endsection

@section('scripts')
    <script>
        // When the DOM is ready, run this function
        $(document).ready(function() {
            //Set the carousel options
            $('#quote-carousel').carousel({
                pause: true,
                interval: 4000
            });
        });
    </script>
@endsection