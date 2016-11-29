<?php

namespace App\Http\Controllers;

use App\Solicitude;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel_Style_Alignment;
use PHPExcel_Style_Border;

class CertificationController extends Controller
{

    public function show()
    {
        /*$users = User::where('role_id', 3)->get();*/
        $users = DB::table('users')
            ->leftjoin('solicitudes', 'users.id', '=', 'solicitudes.user_id')
            ->select(DB::raw('users.id, users.name, users.email, users.celular, users.created_at, users.dni, solicitudes.user_id'))
            ->where('users.role_id', 3)
            ->distinct()->get();
        //dd($users);
        return view('certification.index')->with(compact('users'));
    }

    public function apply(Request $request)
    {
        $idusuario = $request->get('usuarioid');

        $usuario = User::find($idusuario);
        if($usuario == null)
        {
            return response()->json(['error' => true, 'message' => 'El usuario ya no existe, actualice la pagina.']);
        }

        Solicitude::create([
            'user_id' => $idusuario,
            'certificate_id' => 1
        ]);

        return response()->json(['error' => false, 'message' => 'Se ha solicitado su certificado.']);
    }
}