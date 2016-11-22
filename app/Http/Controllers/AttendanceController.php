<?php

namespace App\Http\Controllers;

use App\Milestone;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class AttendanceController extends Controller
{
    public function adminIndex()
    {
        $milestones = Milestone::all();
        $today  = new Carbon();
        $hour   = $today->hour;
        $minute = $today->minute;

        if( $hour<10 )
            $hour = '0'.$hour;
        if( $minute<10 )
            $minute = '0'.$minute;

        $time = $hour.':'.$minute;
        $today = $today->format('Y-m-d');

        return view('attendance.admin.show')->with(compact('milestones','today','time'));
    }

    public function adminCreate( Request $request )
    {
        $name = $request->get('name');
        $date = $request->get('date');
        $time = $request->get('time');

        $milestone = Milestone::where('name',$name)->first();
        if( count($milestone) != 0 )
            return response()->json(['error'=>true,'message'=>'Ya existe un hito registrado con ese nombre']);

        $milestone = Milestone::where('date',$date)->where('time',$time)->first();
        if( count($milestone)!=0  )
            return response()->json(['error'=>true,'message'=>'Ya existe un hito registrado con esa fecha y hora']);

        $milestone = Milestone::create([
            'name'=>$name,
            'date'=>$date,
            'time'=>$time
        ]);

        $users = User::where('role_id',3)->get(['id']);
        $users_id = [];
        foreach ( $users as $user )
            $users_id []= $user->id;

        $milestone->users()->attach($users_id);
        $milestone->save();

        return response()->json(['error'=>false,'message'=>'Hito registrado correctamente']);
    }

    function adminDelete( Request $request )
    {
        $id = $request->get('id');
        $milestone = Milestone::find($id);
        $milestone->users()->detach();
        $milestone->delete();

        return response()->json(['error'=>false,'message'=>'Hito eliminado correctamente']);
    }

    // Managin atendances
    public function adminAttendance( $id )
    {
        return view('attendance.admin.index')->with(compact('id'));
    }

    public function adminUsers( $milestone,$dni )
    {
        $milestone = Milestone::find($milestone);
        $users= $milestone->users;
        if ($dni== 'z')
            return response()->json($users);
        else
        {
            $users= $milestone->users;
            $users_found= collect();
            foreach ( $users as $user)
                if( strpos($user->dni, $dni) !== false)
                    $users_found->push($user);

            return response()->json($users_found);
        }
    }

    public function adminAttendanceRegister( Request $request )
    {
        $milestone = $request->get('milestone');
        $id = $request->get('id');
        $check = $request->get('check');

        $milestone = Milestone::find($milestone);

        foreach ( $milestone->users as $user ){
                if( $user->id == $id ) {
                    $user->pivot->check = $check;
                    $user->pivot->save();
                }
        }

        return response()->json(['error'=>false,'message'=>'Asistencias registradas correctamente']);
    }
}
