<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {
// Entries
    Route::get('/', 'Controller@getWelcome');
    Route::auth();
    Route::get('/home', 'HomeController@index');
});


Route::group(['middleware' => 'auth'], function () {
// Entries

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
});