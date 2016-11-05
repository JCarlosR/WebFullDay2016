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

}
