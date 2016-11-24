<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Question;
use App\Survey;
use App\Survey_detail;
use Tymon\JWTAuth\Facades\JWTAuth;


class SurveyController extends Controller
{
    //
    public function SendQuestions(Request $request)
    {
    	date_default_timezone_set('America/Lima');
		$time = time();
		$hora=(int)date("H", $time);
        $User = JWTAuth::parseToken()->authenticate();
		if ($hora < 13) {
            $encu=Survey::where('user_id',$User->id)->where('turn', 'M')->get();
            if (count($encu) > 0) {
                $Questions['questions']=Question::where('type',0)->get();
                return $Questions;
            }else{
                $Questions['questions']=Question::where('enable', 1)->where('turn', 'M')->get();
                return $Questions;
            }
		}
		else{
            $encu=Survey::where('user_id',$User->id)->where('turn', 'T')->get();
            if (count($encu) > 0) {
                $Questions['questions']=Question::where('type',0)->get();
                return $Questions;
            }else{
			     $Questions['questions']=Question::where('enable', 1)->where('turn', 'T')->get();
			     return $Questions;
            }
		}

        
    }
    public function ReceptionQuestions(Request $request)
    {
    	date_default_timezone_set('America/Lima');
        $time = time();
        $hora=(int)date("H", $time);
        $User = JWTAuth::parseToken()->authenticate();
        
        $answers= $request->get('answers');
        if ($hora<13) {
            $survey=Survey::create([
                        'user_id'=>$User->id,
                        'turn'=>"M",
                 ]);
            $aux=1;
            foreach($answers as $score)
                {
                    Survey_detail::create([
                            'survey_id'=>$survey->id,
                            'question_id'=>$aux,
                            'answer'=>$score,
                            'score'=>null,
                        ]);
                    $aux=$aux+1;
                }
            $error = "Encuesta enviada satisfactoriamente";
            return response()->json(compact('error'));
        }else{
            $survey=Survey::create([
                        'user_id'=>$User->id,
                        'turn'=>"T",
                 ]);
            $aux=28;
            foreach($answers as $score)
                {
                    Survey_detail::create([
                            'survey_id'=>$survey->id,
                            'question_id'=>$aux,
                            'answer'=>$score,
                            'score'=>null,
                        ]);
                    $aux=$aux+1;                    
                }
            $error = "Encuesta enviada satisfactoriamente";
            return response()->json(compact('error'));
        }
    }
}
