<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'name.min' => 'Asegúrate de ingresar tu nombre completo.',
            'name.max' => 'El nombre es demasiado extenso.',
            'email.required' => 'Debes ingresar tu email',
            'email.max' => 'El email es demasiado extenso',
            'email.unique' => 'El email ya está en uso',
            'name.required' => 'Debes ingresar tu nombre completo.',
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
            'carrera.max' => 'El nombre de tu carrera es demasiado extenso.',
            'password.required' => 'Ingrese una contraseña.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.'
        ];

        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'dni' => 'required|digits:8|numeric',
            'celular' => 'required|digits:9|numeric',
            'universidad' => 'required|min:3|max:255',
            'carrera' => 'required|min:3|max:255',
            'ciclo' => 'numeric|min:1|max:10'
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $egresado = isset($data['egresado'])?$data['egresado']:0;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => 3,
            'dni' => $data['dni'],
            'celular' => $data['celular'],
            'universidad' => $data['universidad'],
            'carrera' => $data['carrera'],
            'ciclo' => $data['ciclo'],
            'egresado' => $egresado
        ]);
    }
}
