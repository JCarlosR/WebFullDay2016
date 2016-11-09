<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'Controller@getWelcome');
    Route::auth();
    Route::get('/home', 'HomeController@index');
    // Contact
    Route::post('/contact', 'MailController@send');
});


Route::group(['middleware' => 'auth'], function () {
    // Profile
    Route::get('/datos', 'HomeController@profile');

    // Papers
    Route::get('/ponencias', 'PaperController@index');
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
});