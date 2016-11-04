<?php

namespace App\Http\Controllers;

use App\Solicitude;
use App\User;
use App\Certificate;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class SolicitudeController extends Controller
{
    public function index()
    {
    	$users = User::where('id', Auth()->user()->id)->get();
    	$certificates=Certificate::where('enable', 1)->get();

        return view('solicitude.index')->with(compact('users','certificates'));
    }

    public function create( Request $request )
    {
    	$id_user=$request->get('idusuario');
    	$id_cert=$request->get('idcerti');

        $request = Solicitude::create([
            'user_id'=>$id_user,
            'certificate_id'=>$id_cert,
            'paid'=>0,
            'enable'=>1,

        ]);
    }
}
