<?php

namespace App\Http\Controllers;

use App\Solicitude;
use App\User;
use App\Certificate;
use App\Event;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class SolicitudeController extends Controller
{
    public function index()
    {
    	$users = User::where('id', Auth()->user()->id)->get();
        $events=Event::where('enable', 1)->get();
    	$certificates=Certificate::where('enable', 1)->get();
        $solicitudes=Solicitude::where('enable', 1)->where('user_id', Auth()->user()->id)->get();

        return view('solicitude.index')->with(compact('users','certificates','events','solicitudes'));
    }

    public function create( Request $request )
    {
    	$id_user=$request->get('idusuario');
        $certi = $request->get('certific');
        foreach($certi as $cert)
        {
            Solicitude::create([
                    'user_id'=>$id_user,
                    'certificate_id'=>$cert,

                ]); 
        }
    }
}
