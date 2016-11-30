<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;


use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function send( Request $request )
    {
        //dd($request->name);
        Mail::send('emails.contact', $request->all(), function ($msj){
           $msj->subject('Correo de contacto');
            $msj->to('iifullday.sistemasunt@gmail.com');
        });

        return response()->json(['error'=>false,'message'=>'Correo enviado correctamente']);

    }
    
    public function show()
    {
        $nameUser = Auth()->user()->name;
        $emailUser = Auth()->user()->email;

        return view('emails.contacto')->with(compact('nameUser', 'emailUser'));
        
    }

    public function sendUser()
    {
        //$users = User::where('id', '>', 250)->get();
        $emails = [];
        $users = DB::table('milestone_user')
            ->join('milestones', 'milestone_user.milestone_id', '=', 'milestones.id')
            ->join('users', 'milestone_user.user_id', '=', 'users.id')
            ->select(DB::raw('users.id, users.name, users.email'))
            ->where('milestone_user.check', 1)
            ->orderby('users.id')
            ->distinct()->take(50)->get();
        /*$users = DB::table('milestone_user')
            ->join('milestones', 'milestone_user.milestone_id', '=', 'milestones.id')
            ->join('users', 'milestone_user.user_id', '=', 'users.id')
            ->select(DB::raw('users.id, users.name, users.email'))
            ->where('milestone_user.check', 1)
            ->where('users.id', '>', 88)
            ->orderby('users.id')
            ->distinct()->take(50)->get();*/
        /*$users = DB::table('milestone_user')
            ->join('milestones', 'milestone_user.milestone_id', '=', 'milestones.id')
            ->join('users', 'milestone_user.user_id', '=', 'users.id')
            ->select(DB::raw('users.id, users.name, users.email'))
            ->where('milestone_user.check', 1)
            ->where('users.id', '>', 221)
            ->orderby('users.id')
            ->distinct()->take(50)->get();*/
        foreach ($users as $user){
            array_push($emails, $user->email);
        }
        dd($emails);
        Mail::send('emails.correo', [], function($message) use ($emails)
        {
            $message->to($emails)->subject('Entrega de Certificados');
            /*$message->attach('assets/prueba.pdf', array(
                    'as' => 'pdf-report.zip',
                    'mime' => 'application/pdf')
            );*/
        });
        
        return response()->json(['error'=>false,'message'=>'Correo enviado correctamente']);

    }

}