<?php

namespace App\Http\Controllers;

use App\Paper;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class PaperController extends Controller
{
    public function index()
    {
        $papers = Paper::where('enable', 1)->get();
        return view('paper.index')->with(compact('papers'));
    }

}