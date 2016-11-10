<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Solicitude;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function history()
    {
        $requests = Solicitude::where('user_id', auth()->user()->id)->get();
        $requests = Solicitude::where('user_id', auth()->user()->id)->get();
        return view('history')->with(compact('requests'));
    }

    public function getProfile()
    {
        $user = auth()->user();
        return view('profile')->with(compact('user'));
    }

    public function postProfile(Request $request)
    {
        $rules = [
            'name' => 'required|min:5|max:255',
            'dni' => 'required|digits:8|numeric',
            'celular' => 'required|digits:9|numeric',
            'universidad' => 'required|min:3|max:255',
            'carrera' => 'required|min:3|max:255',
            'ciclo' => 'numeric|min:1|max:10'
        ];
        $messages = [
            'name.required' => 'Debes ingresar tu nombre completo.',
            'name.min' => 'Asegúrate de ingresar tu nombre completo.',
            'name.max' => 'El nombre es demasiado extenso.',
            'dni.required' => 'Debes ingresar tu DNI.',
            'dni.digits' => 'El formato del DNI no es adecuado.',
            'celular.required' => 'Ingresa tu número de celular.',
            'celular.digits' => 'Ingresa tu número de celular sin espacios, solo números.',
            'celular.numeric' => 'Ingresa tu número de celular sin espacios, solo números.',
            'universidad.required' => 'Ingresa el nombre de tu universidad.',
            'universidad.min' => 'Ingresa al menos 3 caracteres en el campo universidad.',
            'universidad.max' => 'El nombre de tu universidad es demasiado extenso.',
            'carrera.required' => 'Ingresa la carrera que estás estudiando o estudiaste.',
            'carrera.min' => 'Ingresa al menos 3 caracteres en el campo carrera.',
            'carrera.max' => 'El nombre de tu carrera es demasiado extenso.'
        ];
        $this->validate($request, $rules, $messages);

        // Successful validation
        $user = auth()->user();
        $user->name = $request->get('name');
        $user->dni = $request->get('dni');
        $user->celular = $request->get('celular');
        $user->universidad = $request->get('universidad');
        $user->carrera = $request->get('carrera');
        $user->ciclo = $request->get('ciclo');
        $user->egresado = $request->get('egresado');
        // dd($request->get('egresado'));
        $user->save();

        return back()->with('notification', 'Tus datos se han actualizado correctamente.');
    }

}
