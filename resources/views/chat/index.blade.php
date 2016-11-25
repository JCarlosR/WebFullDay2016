@extends('layouts.panel')

@section('title','Chat Realtime')

@section('manage-chat','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Chat</a>
    </li>
    <li class="active">Chat Realtime with Firebase</li>
@endsection

@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');
        .card-style {
            display: block;
            background-color: #fff;
            height: 100px;
            margin: 5px 0px;
            box-shadow: 1px 1px 8px #999;
            cursor: pointer;
        }
        .card-img {
            height: 100px;
            width: 100px;
        }
        .media-heading {
            margin-top: 10px;
            color: #444;
        }
        .media-heading:hover, a:link {
            color: #00C853;
            text-decoration: none;
        }
        .members {
            margin-top: 20px;
            color: #999;
            float: left;
        }
        .btn-part {
            display: inline-block;
            margin: 10px;
            float: right;
        }
        .badge {
            display: inline-block;
            background: #00C853;
            float: right;
            padding: 7px;
            border-radius: 50px;
            margin: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3">
                        <div class="card-style">
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object img-thumbnail card-img" src="https://goo.gl/T99N2c">
                                </div>
                                <div class="media-body">
                                    <a href="#"><h5 class="media-heading">HTML5 + CSS3 Dev's</h5></a>
                                    <span class="members"><small>A 12 personas le gusta esta pregunta</small></span>
                                    <span class="badge">+99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    
@endsection