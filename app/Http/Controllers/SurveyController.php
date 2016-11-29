<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Question;
use App\Survey;
use App\Survey_detail;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use App\Itinerarie;

class SurveyController extends Controller
{
    //
    public function SendQuestions(Request $request)
    {
    	date_default_timezone_set('America/Lima');
		$time = time();
		$hora=(int)date("H", $time);
        $User = JWTAuth::parseToken()->authenticate();
		if ($hora < 14) {
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
        if ($hora<14) {
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

    public function indexMa(){
        $encu=Survey::where('user_id',Auth()->user()->id)->where('turn', 'M')->get();
        if (count($encu) > 0) {
            $questions=Question::where('type',0)->get();
            return redirect('/survey/send'); 
        }else{
            $questions=Question::where('enable', 1)->where('turn', 'M')->get();
            return view('survey.indexma')->with(compact('questions'));
        }

    }
    public function indexta(){
        $encu=Survey::where('user_id',Auth()->user()->id)->where('turn', 'T')->get();
        if (count($encu) > 0) {
            $questions=Question::where('type',0)->get();
            return redirect('/survey/send');
        }else{
            $questions=Question::where('enable', 1)->where('turn', 'T')->get();
            return view('survey.indexta')->with(compact('questions'));
        }
    }
    public function createSurveyMan( Request $request )
    {       
        $answers= $request->get('questions');
        $survey=Survey::create([
                        'user_id'=>Auth()->user()->id,
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
        return redirect('/survey/send'); 
    }
    public function createSurveyTar( Request $request )
    {       
        $answers= $request->get('questions');
        $survey=Survey::create([
                        'user_id'=>Auth()->user()->id,
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
        return redirect('/survey/send'); 
    }
    public function send()
    {       
        return view('survey.end');
    }
}
