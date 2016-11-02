@extends('layouts.panel')

@section('styles')
    <style>

        @import "http://fonts.googleapis.com/css?family=Roboto:300,400,500,700";
        article {
            border-bottom: 1px solid #ddd;
        }
        .search-result .thumbnail {
            border-radius: 0 !important;
            width: 250px;
            height: 140px;
        }
        .image {
            width: 250px !important;
            height: 130px !important;
        }
        .search-result:first-child { margin-top: 0 !important; }
        .search-result { margin-top: 20px; }
        .search-result .col-md-2 { border-right: 1px dotted #ccc; min-height: 140px; }
        .search-result ul { padding-left: 0 !important; list-style: none;  }
        .search-result ul li { font: 400 normal .85em "Roboto",Arial,Verdana,sans-serif;  line-height: 30px; }
        .search-result ul li i { padding-right: 5px; }
        .search-result .col-md-7 { position: relative; }
        .search-result h3 { font: 500 normal 1.375em "Roboto",Arial,Verdana,sans-serif; margin-top: 0 !important; margin-bottom: 10px !important; }
        .search-result h3 > a, .search-result i { color: #248dc1 !important; }
        .search-result p { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; }
        .search-result span.plus { position: absolute; right: 0; top: 126px; }
        .search-result span.plus a { background-color: #248dc1; padding: 5px 5px 3px 5px; }
        .search-result span.plus a:hover { background-color: #414141; }
        .search-result span.plus a i { color: #fff !important; }
        .search-result span.border { display: block; width: 97%; margin: 0 15px; border-bottom: 1px dotted #ccc; }

    </style>
@endsection

@section('title','Ponencias')

@section('event','open')

@section('paper','active')


@section('menu-active')
    <li>
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

    <div class="space-6"></div>

    <div class="row">
        <div class="col-xs-12">

            <section class="col-xs-12 col-sm-6 col-md-12">
                @foreach( $papers as $paper )
                <article class="search-result row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <a href="#" title="{{ $paper->speaker->name }}" class="thumbnail"><img class="image" src="{{ asset('assets/images') }}/{{ $paper->speaker->image }}" alt="{{ $paper->speaker->name }}" /></a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <ul class="meta-search">
                            <li><i class="glyphicon glyphicon-calendar"></i> <span>{{ date('jS F Y', strtotime($paper->realization)) }}</span></li>
                            <li><i class="glyphicon glyphicon-time"></i> <span>{{ $paper->start }}</span></li>
                            <li><i class="glyphicon glyphicon-tags"></i> <span>Ponencia</span></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                        <h3><a href="#" title="">{{ $paper->subject }}</a></h3>
                        <p>{{ $paper->description }}</p>
                        <p>Por {{ $paper->speaker->name }}</p>
                    </div>
                    <span class="clearfix borda"></span>
                </article>
                <div class="space-6"></div>
                @endforeach
            </section>
        </div>

    </div><!-- /.row -->
@endsection