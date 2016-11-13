<?php

namespace App\Http\Controllers;

use App\Itinerarie;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class itineraryController extends Controller
{
    public function index()
    {
    	$itinerary = Itinerarie::where('enable', 1)->get();
        return view('itinerary.index')->with(compact('itinerary'));
    }

    public function listar()
    {
        $itineraries = Itinerarie::where('enable', 1)->get();
        return view('itinerary.listar')->with(compact('itineraries'));
    }

    public function adminRegister(Request $request)
    {
        $type = $request->get('type');
        $description = $request->get('description');
        $start = $request->get('start');
        $end = $request->get('end');

        if ($description == null || $description == "") {
            return response()->json(['error' => true, 'message' => 'Es necesario especificar una descripción.']);
        }

        $itinerary = Itinerarie::create([
            'type' => $type,
            'description' => $description,
            'start' => $start,
            'end' => $end,
            'enable' => 1
        ]);

        return response()->json(['error'=>false,'message'=>'Actividad guardada correctamente']);
    }

    public function adminEdit(Request $request)
    {
        $itinerary_id = $request->get('id-e');
        $type = $request->get('type-e');
        $description = $request->get('description-e');
        $start = $request->get('start-e');
        $end = $request->get('end-e');

        $speaker = Itinerarie::find($itinerary_id);
        if ($speaker == null) {
            return response()->json(['error' => true, 'message' => 'La actividad seleccionada ya no existe.']);
        }

        if ($description == null || $description == "") {
            return response()->json(['error' => true, 'message' => 'Es necesario especificar una descripción.']);
        }

        $itinerarie = Itinerarie::find( $itinerary_id );
        $itinerarie->type = $type;
        $itinerarie->description = $description;
        $itinerarie->start = $start;
        $itinerarie->end = $end;
        $itinerarie->save();

        return response()->json(['error'=>false,'message'=>'Actividad modificada correctamente']);
    }

    public function adminDelete(Request $request)
    {
        $itinerarie_id = $request->get('id-d');

        $itinerarie = Itinerarie::find($itinerarie_id);
        $itinerarie->enable = 0;
        $itinerarie->save();

        return response()->json(['error'=>false,'message'=>'Actividad eliminada correctamente']);
    }
}
