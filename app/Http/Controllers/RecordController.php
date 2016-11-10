<?php

namespace App\Http\Controllers;

use App\Speaker;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class RecordController extends Controller
{
    public function index()
    {
        return view('record.index');
    }

}