<?php

namespace App\Http\Controllers\Auth;

use App\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Mail;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
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
        $ciclo = isset($data['ciclo'])?$data['ciclo']:0;

        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => 3,
            'dni' => $data['dni'],
            'celular' => $data['celular'],
            'universidad' => $data['universidad'],
            'carrera' => $data['carrera'],
            'ciclo' => $ciclo,
            'egresado' => $egresado
        ]);

        Mail::send('emails.email', $data, function($message) use ($data)
        {
            $message->to($data['email'])->subject('Correo de confirmación');
        });

        return $user;



    }

    public function authenticate(Request $request)
    {
        // grab credentials from the request
        //$credentials = $request->only(['email', 'password']);

        /*try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }*/

        $email = $request->get('email');
        $password = $request->get('password');
        //dd($email);

        if (Auth::attempt(['email' => $email, 'password' => $password]))
        {
            $private_key = "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDLNbrdzUx8YJJf\n505fBiZ4ZvSD1Zh/1QJgzceoga/rMoeiwip+al8aYk0V+M9uQbET7NSMZpKJj+5H\n1/yKvIzpVYAeUu0t54E4O57kpaAxIRB1VoesPrLu8EDLr2gUnpeytw7KWU0RdraM\nJ2khFCWxPJf1m1dpfCztqa/jVCYVm7AkZn7L5Lwz53Yz+ol12OZpAS6njifD/JOn\nATh4FmJ+LIm5JFc53Ovf7IcPSwtTsRfNNVqBM1VM0WWNvFSxc83z/3npjci3u2hW\nYeh/Jmbj8fzI5HsEmsdkvFlulKiKUaTlkFDXvC6A06GADiYNj4vmQwidWYZ/I7Z1\nn4NRINNFAgMBAAECggEASxet2Cz3aLbfIGV/honlSXTyQo157zMtz8v7Tf+unIFt\nse2CenigcEWHKulo7duErlJEMSXuXLs9WHsuLa6De+5Gi+4lC2OTUs5lZyT1T3Ji\nfJnfRP1ebgGGUD6ffY8li7st0gSyABQYXS5rIPgq/ZXgqbgf0zE6ARFFmAIOmMjo\nlTGW5S6Fw4rPXU3Q7c63C4X+WDyfJsUb6v6EAFJqjZIfIehlSH93qmd1uDwlLrfu\n/eikD+m0kQrB0g/pOmEaJl8/yfbTRxc+kcCM1778FEs5MzDmCu8yz9B/9TyJaDaw\nu2OsxrD6MgjimCrwmKQbLdaaRiavrtgvmlhOSAo/OQKBgQD0QHxYEdYF7mKGeKD8\nKjG1GbAWcZw5Xd0hcQfTT3qVwK+4d2v3V0qFy7viNIVdnsGJHeeFup6EWBBgS7GU\nIvsdCLyt3Su55Hqyv45Aqfz2vpTefOybpdQn3X62Hwvg3PZs4j5Gdo709/hje7at\nGYv4srqKW0eiAeNBAejzdTEN2wKBgQDU++MW0gRHgviR3P6JQvJXRu8QUpTPbu+e\nA7d8uOopTAPcUDT9a6pOzbw9GKd5SdJ4UabmVpkqkO6SJ/Tbd2G0dIQ/sxjKSTc4\ncXq6n8grNjiByIggstd5t4jnQvicVF8etLvkrkgWAarirOf8f6/mTu9ChqRh4h5K\nK48QOba9XwKBgFs/F/TCvQS8OJxpxiJOFQHF1e2chbM8qJaMplK/t1jogfzUyEW/\nm3x+TvNDkasW2tBBlrNzszJXv85pmK5xnwQKtonxPRuWCmxqeVcY6gK30d+IJdBD\n1A0MhwC8enCHu5uTrZYfRmqnlGh92BG0oIDJLDzxusIAGIi5kPAakLfPAoGAb3gV\ndlAcpUDKz6yWG0jKhRs+65ANCjPJfS38zm4JP+vk6V2hHjFHRU8wAdnxbO1SFl7F\ntzADod+QvTXkVSi6HjQNMzmM8/I10Hiz/xC5NsR99o75kAOJ+s4v/Ll0XH1b+zok\nTJ9aYwokYdaU4/YAHc2aM3s8dW5e4/rAOYG7PokCgYEAo9soCw5Wdkbn2aVxtx+z\ny1eK+lyLJ6/qai6Aj3BFJT9gUcQ2AKpGj6KTlhl7SF9YwPLuYxeyuI+KJ+3GDqUW\n4QEPZaEURwQS/XLwPonWW10emXG48w3uvtdueWkfIgTBKJcnpHx3/CJFDgn1vLYu\n6+VmiqSuVFZ/lz0/jcJECdI=\n-----END PRIVATE KEY-----\n";
            $now_seconds = time();
            $customClaims = array(
                "iss" => "firebase-adminsdk-u52iu@full-day-2016.iam.gserviceaccount.com",
                "sub" => "firebase-adminsdk-u52iu@full-day-2016.iam.gserviceaccount.com",
                "aud" => "https://identitytoolkit.googleapis.com/google.identity.identitytoolkit.v1.IdentityToolkit",
                "iat" => $now_seconds,
                "exp" => $now_seconds+(60*60),  // Maximum expiration time is one hour
                "uid" => Auth::user()->id
            );
            $payload = JWTFactory::make($customClaims);
            $token = JWTAuth::encode($payload, $private_key, "RS256");
            dd($token);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function testApi(Request $request)
    {
        $currentUser = JWTAuth::parseToken($request->get('token'))->authenticate();
        return $currentUser;
    }

    public function myrutita()
    {
        $date =  new Carbon();
        $time = $date->timestamp;
        /*$time6 = time();*/
        dd($time);
    }
}
