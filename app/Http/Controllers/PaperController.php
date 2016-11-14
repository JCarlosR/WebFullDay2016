<?php

namespace App\Http\Controllers;

use App\Paper;
use App\Speaker;
use Carbon\Carbon;
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
        $carbon = new Carbon();
        $date = $carbon->now();
        $date = $date->format('Y-m-d');
        return view('paper.show')->with(compact('papers', 'speakers', 'date'));
    }

    public function store( Request $request){
        $speaker_id = $request->get('ponentes');
        $subject = $request->get('subject');
        $date = $request->get('date');
        $start = $request->get('start');
        $end = $request->get('end');
        
        $speaker = Speaker::find($speaker_id);
        if ($speaker == null) {
            return response()->json(['error' => true, 'message' => 'El ponente no existe, elija un ponente correcto.']);
        }

        if ($subject == null || $subject == "") {
            return response()->json(['error' => true, 'message' => 'Es necesario especificar un tema de la ponencia.']);
        }

        $paper = Paper::create([
            'speaker_id' => $speaker_id,
            'subject' => $subject,
            'start' => $start,
            'end' => $end,
            'realization' => $date,
            'enable' => 1
        ]);

        return response()->json(['error'=>false,'message'=>'Ponencia guardada correctamente']);
    }

    public function edit( Request $request){
        $paper_id = $request->get('paper');
        $speaker_id = $request->get('speakers');
        $subject = $request->get('subject-e');
        $date = $request->get('date-e');
        $start = $request->get('start-e');
        $end = $request->get('end-e');

        $speaker = Speaker::find($speaker_id);
        if ($speaker == null) {
            return response()->json(['error' => true, 'message' => 'El ponente no existe, elija un ponente correcto.']);
        }

        if ($subject == null || $subject == "") {
            return response()->json(['error' => true, 'message' => 'Es necesario especificar un tema de la ponencia.']);
        }

        $paper = Paper::find( $paper_id );
        $paper->speaker_id = $speaker_id;
        $paper->subject = $subject;
        $paper->start = $start;
        $paper->end = $end;
        $paper->realization = $date;
        $paper->save();

        return response()->json(['error'=>false,'message'=>'Ponencia modificada correctamente']);
    }

    public function delete( Request $request){
        $paper_id = $request->get('idEliminado');

        $paper = Paper::find( $paper_id );
        $paper->enable = 0;
        $paper->save();

        return response()->json(['error'=>false,'message'=>'Ponencia modificada correctamente']);
    }

}