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
    	$id_user=$request->get('user_id');
        $turn = $request->get('turn');
        $question_id= $request->get('question_id');
        $question=Question::where('id',$question_id)->first();
        $type=$question->type;

        $survey= Survey::create([
                    'user_id'=>$id_user,
                    'turn'=>$turn,
            ]);

        $survey_id=$survey->id;

        /*
        if ($type==1) {
            $scor= $request->get('score');
            foreach($scor as $score)
            {
      			Survey_detail::create([
                        'survey_id'=>$survey_id,
                        'question_id'=>$question_id,
                        'answer'=>null,
                        'score'=>$score,
                 ]);
            }
        }
        else{
            $answe= $request->get('answer');
            foreach($answe as $answer)
            {	
            	Survey_detail::create([
                        'survey_id'=>$survey_id,
                        'question_id'=>$question_id,
                        'answer'=>$answer,
                        'score'=>null,
                    ]);
            }
        }*/
    }
}
