<?php

namespace App\Http\Controllers;

use App\Speaker;

class InfoController extends Controller
{
    public function index()
    {
        return Speaker::all();
    }
}
