<?php

namespace App\Http\Controllers;

use App\Itinerarie;
use Illuminate\Http\Request;

use App\Http\Requests;

class itineraryController extends Controller
{
    public function index()
    {
    	$itinerary = Itinerarie::where('enable', 1)->get();
        return view('itinerary.index')->with(compact('itinerary'));
    }

}
