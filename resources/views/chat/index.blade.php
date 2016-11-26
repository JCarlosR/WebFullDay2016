@extends('layouts.panel')

@section('title','Preguntas en Realtime')

@section('manage-chat','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Chat</a>
    </li>
    <li class="active">Preguntas en Realtime</li>
@endsection

@section('styles')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');
        .card-style {
            display: block;
            background-color: #fff;
            height: 120px;
            margin: 5px 0px;
            box-shadow: 1px 1px 8px #999;
            cursor: pointer;
        }
        .card-img {
            max-height: 120px;
            max-width: 120px;
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
            display: inline-block;
            color: #999;
        }
        .badge {
            display: inline-block;
            background: #1b6aaa;
            border-radius: 50px;
            margin-left: 3px;
            margin-right: 3px;
        }
        .description{
            font-size: 18px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row" id="chatUl">
            <div class="col-md-6 col-md-offset-3">
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://www.gstatic.com/firebasejs/3.6.0/firebase.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyBXAoSbi6j8D70huGk1ru9MqroQfycIIwU",
            authDomain: "full-day-2016.firebaseapp.com",
            databaseURL: "https://full-day-2016.firebaseio.com",
            storageBucket: "full-day-2016.appspot.com",
            messagingSenderId: "201017383589"
        };
        firebase.initializeApp(config);

        var $txtId = $('#id');
        var $txtNombre = $('#nombre');
        var $txtPregunta = $('#pregunta');
        var $btnEnviar = $('#btnEnviar');
        var $chatUl = $('#chatUl');

        $btnEnviar.on("click", function() {
            var id = $txtId.val();
            var nombre = $txtNombre.val();
            var pregunta = $txtPregunta.val();

            var questionData = {
                description: pregunta,
                likes: 0,
                user: nombre
            };
            firebase.database().ref().child('questions').push(questionData);
        });

        firebase.database().ref('questions').orderByChild('likes')
                .on('value', function(snapshot) {
                    var html = '';
                    snapshot.forEach(function (e) {
                        var element = e.val();
                        var key = e.key;
                        var nombre = element.user;
                        var likes = element.likes;
                        var description = element.description;
                        var li_html = '';
                        li_html += '    <div class="row">';
                        li_html += '        <div class="col-md-8 col-sm-8 col-md-offset-2">';
                        li_html += '            <div class="card-style">';
                        li_html += '                <div class="media">';
                        li_html += '                    <div class="media-left">';
                        li_html += '                        <img class="media-object img-thumbnail card-img" src="{{ asset('images/logo_200_200.png') }}">';
                        li_html += '                    </div>';
                        li_html += '                    <div class="media-body">';
                        li_html += '                        <p><h5 class="media-heading">'+nombre+'</h5></p>';
                        li_html += '                        <p class="description">'+description+'</p>';
                        li_html += '                        <p class="members">A </p><p class="badge">'+likes+'</p><p class="members">personas le gusta esta pregunta.</p>';
                        li_html += '                    </div>';
                        li_html += '                </div>';
                        li_html += '            </div>';
                        li_html += '        </div>';
                        li_html += '    </div>';
                        html = li_html + html;


                    });
                    $chatUl.html(html);
                });
    </script>
@endsection