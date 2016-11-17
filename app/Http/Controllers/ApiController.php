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

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $token = JWTAuth::fromUser($user);
            // dd($token);
        } else {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }

    public function testApi()
    {
        $currentUser = JWTAuth::parseToken()->authenticate();
        dd($currentUser);
        return $currentUser;
    }

}
