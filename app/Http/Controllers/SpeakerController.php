<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class SpeakerController extends Controller
{
    public function index()
    {
        return view('speaker.index');
    }

}