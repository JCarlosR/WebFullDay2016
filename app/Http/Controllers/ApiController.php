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
        $credentials = ['email' => $email, 'password' => $password];
        
        // Default values
        $token = '';
        $error = false;

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = JWTAuth::fromUser($user);
        } else {
            $error = true;
        }

        // all good so return the token
        return response()->json(compact('token', 'error'));
    }

    public function testApi()
    {
        $currentUser = JWTAuth::parseToken()->authenticate();
        dd($currentUser);
        return $currentUser;
    }

}
