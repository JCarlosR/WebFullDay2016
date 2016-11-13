<?php

namespace App\Http\Controllers;

use App\Speaker;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class RecordController extends Controller
{
    public function index()
    {
        return view('record.index');
    }

    public function show()
    {
        $users = User::where('role_id', 3)->get();
        return view('record.index')->with(compact('users'));
    }

}