<?php

namespace App\Http\Controllers;

use App\Itinerarie;
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
        $title = $request->get('title');
        $message = $request->get('message');

        $postdata = http_build_query(
            array(
                'data' => array('title' => $title, 'text' => $message),
                'to' => 'dNC6Ap51wlQ:APA91bGGZ6CsjxKeb-14hrq9MaR2qUwBeo0LkPhF0-Ayt34rJuXBspzBoa1Iwelw5pHidWN2bMKVdH9Z0nCK_puRDt2uKgSMA5Pwdu1D0nuymGIyb7-BUsUa51DstNtZitCo8L77hrhy'

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

        return view('notification.index')->with(compact('result'));
    }

}
