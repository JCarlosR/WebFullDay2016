<?php

Route::auth();
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'Controller@getWelcome');
    Route::get('/home', 'HomeController@index');
    // Contact
    Route::post('/contact', 'MailController@send');
});


Route::group(['middleware' => 'auth'], function () {
    // Profile
    Route::get('/datos', 'HomeController@getProfile');
    Route::post('/datos', 'HomeController@postProfile');

    // Papers
    Route::get('/ponencias', 'PaperController@index');
    Route::get('/papers', 'PaperController@show');
    Route::post('/papers/registrar', 'PaperController@store');
    Route::post('/papers/editar', 'PaperController@edit');
    Route::post('/papers/eliminar', 'PaperController@delete');

    Route::get('/ponentes', 'SpeakerController@index');

    // Payments and Certificates
    Route::get('/pagos', 'PaymentController@show');
    Route::get('/pagos/{id}', 'PaymentController@index');
    Route::post('/pagos/registrar', 'PaymentController@create');
    Route::post('/pagos/eliminar', 'PaymentController@delete');

    Route::post('/certificados/eliminar', 'CertificateController@delete');

    // Itinerary
    Route::get('/itinerario', 'itineraryController@index');

    //Request Certificate
    Route::get('/solicitudes', 'SolicitudeController@index');
    Route::post('/solicitudes/registrar', 'SolicitudeController@create');

    // History
    Route::get('/historial', 'HomeController@history');

    Route::get('/contacto', 'MailController@show');

    Route::get('/record', 'RecordController@index');
    Route::get('/send', 'MailController@sendUser');

    // Question
    Route::get('/Question', 'SurveyController@SendQuestions');
    Route::get('/Question/registrar', 'SurveyController@ReceptionQuestions');
});