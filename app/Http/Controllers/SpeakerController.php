<?php

namespace App\Http\Controllers;

use App\Speaker;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::where('enable', 1)->get();
        //dd($speakers);
        return view('speaker.index')->with(compact('speakers'));
    }

    public function adminIndex()
    {
        if( Auth()->user()->role_id == 3 )
            return redirect('/');

        $speakers = Speaker::where('enable',1)->orderBy('name')->paginate(4);

        return view('speaker.admin.show')->with(compact('speakers'));
    }

    public function adminRegister( Request $request )
    {
        if( Auth()->user()->role_id == 3 )
            return redirect('/');

        $name     = $request->get('name');
        $email    = $request->get('email');
        $company  = $request->get('company');
        $profile  = $request->get('profile');
        $position = $request->get('position');
        $image    = $request->file('image');
        $description = $request->get('description');

        $speaker = Speaker::where('email',$email)->where('enable',1)->first();

        if( count($speaker) != 0 )
            return response()->json(['error'=>true,'message'=>'Ya existe un ponente con esa cuenta de email']);

        $speaker = Speaker::create([
            'name'=>$name,
            'email'=>$email,
            'company'=>$company,
            'profile'=>$profile,
            'position'=>$position,
            'description'=>$description,
            'enable'=>1
        ]);

        $path = public_path().'/assets/images';
        $extension = $image->getClientOriginalExtension();
        $fileName = $speaker->id . '.' . $extension;
        $image->move($path, $fileName);

        $speaker->image = $fileName;
        $speaker->save();

        return response()->json(['error'=>false,'message'=>'Ponente registrado correctamente']);
    }

    public function adminEdit( Request $request )
    {
        if( Auth()->user()->role_id == 3 )
            return redirect('/');

        $id       = $request->get('id');
        $name     = $request->get('name');
        $email    = $request->get('email');
        $company  = $request->get('company');
        $profile  = $request->get('profile');
        $position = $request->get('position');
        $image    = $request->file('image');
        $description = $request->get('description');

        $speaker = Speaker::where('email',$email)->where('enable',1)->first();

        if( count($speaker) == 1 && $speaker->id != $id )
            return response()->json(['error'=>true,'message'=>'Ya existe un ponente con esa cuenta de email']);

        $speaker = Speaker::find($id);
        $speaker->name     = $name;
        $speaker->email    = $email;
        $speaker->company  = $company;
        $speaker->profile  = $profile;
        $speaker->position = $position;
        $speaker->description=$description;

        $path = public_path().'/assets/images';
        if( $image )
        {
            File::delete($path.'/'.$speaker->image);
            $extension = $image->getClientOriginalExtension();
            $fileName = $speaker->id . '.' . $extension;
            $image->move($path, $fileName);

            $speaker->image = $fileName;
        }

        $speaker->save();

        return response()->json(['error'=>false,'message'=>'Ponente modificado correctamente']);
    }

    public function adminDelete( Request $request )
    {
        if( Auth()->user()->role_id == 3 )
            return redirect('/');

        $id = $request->get('id');

        $speaker = Speaker::find($id);
        $speaker->enable=0;
        $speaker->save();

        return response()->json(['error'=>false,'message'=>'Ponente eliminado correctamente']);
    }
}
