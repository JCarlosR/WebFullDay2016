<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Solicitude;
use Illuminate\Http\Request;
use App\Http\Requests;

class CertificateController extends Controller
{
    // Deleting suscription certificate.
    public function delete( Request $request )
    {
        $solicitude_id = $request->get('id');
        $name = $request->get('name');
        $solicitude = Solicitude::find($solicitude_id);
        $solicitude->state = "Anulado";
        $solicitude->save();

        return response()->json(['error'=>false,'message'=>'Usted ha dejado de solicitar el '.$name]);
    }
}
