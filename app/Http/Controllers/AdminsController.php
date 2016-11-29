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

class AdminsController extends Controller
{
    public function listar()
    {
        $usuarios = User::where('role_id','<>',3)->get();
        return view('admin.index')->with(compact('usuarios'));
    }

    public function adminRegister(Request $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $clave = $request->get('clave');

        if ($name == null || $name == "") {
            return response()->json(['error' => true, 'message' => 'Es necesario especificar un nombre.']);
        }
        if ($email == null || $email == "") {
            return response()->json(['error' => true, 'message' => 'Es necesario especificar un email.']);
        }
        if ($clave == null || $clave == "") {
            return response()->json(['error' => true, 'message' => 'Es necesario especificar una clave.']);
        }
        $admina = User::where('email',$email)->first();
        if($admina != null){
            return response()->json(['error' => true, 'message' => 'El email ya existe.']);
        }

        User::create([
            'role_id' => 2, // Administrator
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($clave)
        ]);

        return response()->json(['error'=>false,'message'=>'Administrador creado correctamente.']);
    }

    public function adminEdit(Request $request)
    {
        $user_id = $request->get('id-e');
        $name = $request->get('name-e');
        $email = $request->get('email-e');


        if ($user_id == null || $user_id == "") {
            return response()->json(['error' => true, 'message' => 'Se desconoce codigo del admin.']);
        }

        if ($name == null || $name == "") {
            return response()->json(['error' => true, 'message' => 'Es necesario especificar un nombre.']);
        }

        if ($email == null || $email == "") {
            return response()->json(['error' => true, 'message' => 'Es necesario especificar un email.']);
        }

        $admina = User::where('email',$email)->where('id','<>',$user_id)->first();
        if($admina != null){
            return response()->json(['error' => true, 'message' => 'El email ya existe.']);
        }


        $admin = User::find($user_id);
        if ($admin == null) {
            return response()->json(['error' => true, 'message' => 'El admin ya no existe.']);
        }


        $admin->name = $name;
        $admin->email = $email;
        $admin->save();

        return response()->json(['error'=>false,'message'=>'Administrador modificado correctamente.']);
    }
}