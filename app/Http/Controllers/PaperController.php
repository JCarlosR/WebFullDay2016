<?php

namespace App\Http\Controllers;

use App\Paper;
use App\Speaker;
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

    public function show()
    {
        $papers = Paper::where('enable', 1)->get();
        $speakers = Speaker::where('enable', 1)->get();
        return view('paper.show')->with(compact('papers', 'speakers'));
    }

}