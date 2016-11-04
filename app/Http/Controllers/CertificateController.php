<?php

namespace App\Http\Controllers;

use App\Solicitude;
use Illuminate\Http\Request;

use App\Http\Requests;

class CertificateController extends Controller
{
    public function delete( Request $request )
    {
        $solicitude_id = $request->get('id');
        $name = $request->get('name');
        $solicitude = Solicitude::find($solicitude_id);
        $solicitude->enable = 0;
        $solicitude->save();

        return response()->json(['error'=>false,'message'=>'Usted ha dejado de solicitar el '.$name]);

    }
}
