<?php

namespace App\Http\Controllers;

use App\Itinerarie;
use App\Paper;
use App\Speaker;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    function getWelcome(){
        $speakers = Speaker::where('enable', 1)->get();
        $papers = Paper::where('enable', 1)->get();
        $itinerary = Itinerarie::where('enable', 1)->get();
        return view('welcome')->with(compact('speakers', 'papers', 'itinerary'));
    }

}
