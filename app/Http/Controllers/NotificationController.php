<?php

namespace App\Http\Controllers;

use App\Itinerarie;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index()
    {
        return view('notification.index');
    }

    public function send(Request $request)
    {
        $users = User::All();
        $title = $request->get('title');
        $message = $request->get('message');

        foreach($users as $user)
        {
            $postdata = http_build_query(
                array(
                    'data' => array('title' => $title, 'text' => $message),
                    'to' => $user->androidtoken

                )
            );

            $opts = array('http' =>
                array(
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/x-www-form-urlencoded\r\n".
                        "Authorization:key=AIzaSyACEa05_xdFzdXxx33QhHc8PoJ8u3AQuGE\r\n",
                    'content' => $postdata
                )
            );


            $context  = stream_context_create($opts);

            $result = file_get_contents('https://fcm.googleapis.com/fcm/send', false, $context);

        }


        return view('notification.index')->with(compact('result'));
    }

}
