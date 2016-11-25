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
            height: 120px;
            margin: 5px 0px;
            box-shadow: 1px 1px 8px #999;
            cursor: pointer;
        }
        .card-img {
            height: 120px;
            width: 120px;
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
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3">

                    </div>
                </div>
            </div>

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

        $(document).on('click', '[data-question]', function () {
            var id = $txtId.val();
            var key = $(this).data('question');
            var likes = $(this).data('likes');

            firebase.database().ref('likes/'+id+'/'+key).once('value', function(snap) {
                if (snap.val() == null) {
                    var questionLikeRef = firebase.database().ref('questions/'+key+'/likes');
                    questionLikeRef.transaction(function(currentData) {
                        questionLikeRef.set(likes+1);

                    }, function(error, committed, snapshot) {
                        if (error) {
                            console.log('Transaction failed abnormally!', error);
                        } else if (!committed) {
                            console.log('We aborted the transaction (because ada already exists).');
                        } else {
                            console.log('User ada added!');
                        }
                        console.log("Ada's data: ", snapshot.val());
                    });
                    firebase.database().ref('likes/'+id+'/'+key).set(true);
                } else {
                    var questionLikeRef = firebase.database().ref('questions/'+key+'/likes');
                    questionLikeRef.transaction(function(currentData) {
                        if (currentData != null) {
                            questionLikeRef.set(likes-1);
                            firebase.database().ref('likes/'+id+'/'+key).remove();
                        }
                    }, function(error, committed, snapshot) {
                        if (error) {
                            console.log('Transaction failed abnormally!', error);
                        } else if (!committed) {
                            console.log('We aborted the transaction (because ada already exists).');
                        } else {
                            console.log('User ada added!');
                        }
                        console.log("Ada's data: ", snapshot.val());
                    });
                }
            });
        });


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
                        li_html += '<div class="container">';
                        li_html += '    <div class="row">';
                        li_html += '        <div class="col-md-8 col-sm-8 col-md-offset-2">';
                        li_html += '            <div class="card-style" >';
                        li_html += '                <div class="media">';
                        li_html += '                    <div class="media-left">';
                        li_html += '                        <img class="media-object img-thumbnail card-img" src="{{ asset('images/logo_200_200.png') }}">';
                        li_html += '                    </div>';
                        li_html += '                    <div class="media-body">';
                        li_html += '                        <p><h5 class="media-heading">'+nombre+'</h5></p>';
                        li_html += '                        <p class="description">'+description+'</p>';
                        li_html += '                        <p class="members">A     </p><p class="badge">'+likes+'</p><p class="members">personas le gusta esta pregunta.</p>';
                        li_html += '                    </div>';
                        li_html += '                </div>';
                        li_html += '            </div>';
                        li_html += '        </div>';
                        li_html += '    </div>';
                        li_html += '</div>';
                        html = li_html + html;


                    });
                    $chatUl.html(html);
                    putTextIntoButton();
                });

        function putTextIntoButton() {
            $buttons = $('[data-question]');
            $buttons.each(function (i, button) {
                var $button = $(button);
                var key = $button.data('question');
                var id = $txtId.val();
                firebase.database().ref('likes/'+id+'/'+key).once('value', function(snap) {
                    if (snap.val() == null)
                        $button.text('Me  gusta');
                    else
                        $button.text('Ya no me  gusta');
                    $button.show();
                });
            });
        }
    </script>
@endsection