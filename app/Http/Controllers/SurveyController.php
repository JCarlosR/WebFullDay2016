<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Question;
use App\Survey;
use App\Survey_detail;


class SurveyController extends Controller
{
    //
    public function SendQuestions()
    {
    	date_default_timezone_set('America/Lima');
		$time = time();
		$hora=(int)date("H", $time);
		if ($hora < 13) {
			$Questions=Question::where('enable', 1)->where('turn', 'M')->get();
			return $Questions;
		}
		else{
			$Questions=Question::where('enable', 1)->where('turn', 'T')->get();
			return $Questions;
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
