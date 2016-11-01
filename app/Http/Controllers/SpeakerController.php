<?php

namespace App\Http\Controllers;

use App\Speaker;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::where('enable', 1)->get();
        //dd($speakers);
        return view('speaker.index')->with(compact('speakers'));
    }

}