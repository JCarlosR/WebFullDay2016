<?php

Route::auth();

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'Controller@getWelcome');
    Route::get('/home', 'HomeController@index');
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

    Route::get('/record', 'RecordController@show');
    Route::get('/export/all', 'RecordController@exportAll');
    Route::get('/export/solicitantes', 'RecordController@exportSolicitud');
    Route::get('/send', 'MailController@sendUser');

    // Admin perspective
    //Speakers
    Route::get('admin/ponentes', 'SpeakerController@adminIndex');
    Route::post('admin/ponentes/registrar', 'SpeakerController@adminRegister');
    Route::post('admin/ponentes/editar', 'SpeakerController@adminEdit');
    Route::post('admin/ponentes/eliminar', 'SpeakerController@adminDelete');


    // Payments
    Route::get('admin/pagos', 'PaymentController@adminIndex');
    Route::post('admin/pagos/registrar', 'PaymentController@create');

    Route::get('admin/itinerario', 'itineraryController@listar');
    Route::post('admin/itinerario/registrar', 'itineraryController@adminRegister');
    Route::post('admin/itinerario/editar', 'itineraryController@adminEdit');
    Route::post('admin/itinerario/eliminar', 'itineraryController@adminDelete');

    // inscription
    Route::get('/inscription', 'InscriptionController@index');
    Route::post('/inscription/registrar', 'InscriptionController@register');
});

// Get event information (public webservice)
Route::get('/information', 'InfoController@index');

// Get question information (public webservice)
Route::get('/question', 'SurveyController@SendQuestions');
Route::get('/question/registrar', 'SurveyController@ReceptionQuestions');

// Routes of JWT
Route::get('/authentication', 'Auth\AuthController@authenticate');
Route::get('/retrieve', 'Auth\AuthController@testApi');

Route::get('/rutita', 'Auth\AuthController@myrutita');