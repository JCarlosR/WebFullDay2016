<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Certificate;
use App\User;
use App\Solicitude;
use App\Milestone_user;

class InscriptionController extends Controller
{
    public function index()
    {
    	$certificates=Certificate::where('enable', 1)->where('event_id', 1)->get();
        return view('inscription.index')->with(compact('certificates'));;
    }
    public function register(Request $request)
    {
    	$egresado=0;
    	$ciclo=0;
    	if ($request->get('egresado')!=null) {
    		$egresado =$request->get('egresado');
    	}
    	if ($request->get('ciclo')!=null) {
    		$ciclo =$request->get('ciclo');
    	}
        $user =  User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt("1234"),
            'role_id' => 3,
            'dni' => $request->get('dni'),
            'celular' => $request->get('celular'),
            'universidad' => $request->get('universidad'),
            'carrera' => $request->get('carrera'),
            'ciclo' => $ciclo,
            'egresado' => $egresado,
        ]);

        if ($request->get('certific')!=null) {
    		$id_user=$user->id;
	        $certi = $request->get('certific');
	        foreach($certi as $cert)
	        {
	            Solicitude::create([
	                    'user_id'=>$id_user,
	                    'certificate_id'=>$cert,

	                ]); 
	        }
    	}
        date_default_timezone_set('America/Lima');
        $time = time();
        $hora=(int)date("H", $time);
        if ($hora >= 8 AND $hora < 14) {
            $asistencia =  Milestone_user::create([
                            'milestone_id' => 1,
                            'user_id' => $user->id,
                            'check' => 1,
        ]);
        }
        if ($hora >= 14) {
            $asistencia =  Milestone_user::create([
                            'milestone_id' => 2,
                            'user_id' => $user->id,
                            'check' => 1,
        }
    	return redirect('/record'); 	
    }

}
