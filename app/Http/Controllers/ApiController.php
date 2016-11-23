<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\JWTManager;
use Tymon\JWTAuth\Providers\Auth\AuthInterface;
use Tymon\JWTAuth\Token;

class ApiController extends Controller
{
    public function authenticate(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        $key = $request->get('key');
        $credentials = ['email' => $email, 'password' => $password];
        
        // Default values
        // $token = '';
        $error = false;

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = JWTAuth::fromUser($user);
            $user->androidtoken = $key;
            $name = $user->name;
            $user_id = $user->id;
            $user->save();
        } else {
            $error = true;
        }

        // all good so return the token
        return response()->json(compact('token', 'name', 'user_id', 'error'));
    }

    public function testApi()
    {
        $currentUser = JWTAuth::parseToken()->authenticate();
        return $currentUser;
    }

    public function refreshToken()
    {
    	$token = '';
        $error = false;

        try {
            $token = JWTAuth::parseToken()->refresh();
        } catch (\Exception $e) {
            $error = true;
        }

        return response()->json(compact('token', 'error'));
    }

}
