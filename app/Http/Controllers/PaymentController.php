<?php

namespace App\Http\Controllers;

use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::where('enable',1)->where('user_id',Auth()->user()->id)->get();
        $today = new Carbon();
        $today = $today->format('Y-m-d');
        return view('payment.index')->with(compact('payments','today'));
    }

    public function create( Request $request )
    {
        $entity = $request->get('entity');
        $document = $request->file('payment_file');
        $operation = $request->get('operation');
        $operation_date = $request->get('operation_date');

        $date = new Carbon($operation_date);
        $date = $date->format('d-m-Y');
        $payment = Payment::create([
            'user_id'=>Auth()->user()->id,
            'entity'=>$entity,
            'operation'=>$operation,
            'operation_date'=>$date

        ]);

        $path = public_path().'/assets/img/payment';
        $extension = $document->getClientOriginalExtension();
        $fileName = $payment->id . '.' . $extension;
        $document->move($path, $fileName);
        $payment->payment_file = $fileName;
        $payment->save();

        return response()->json(['error'=>false,'message'=>'Pago registrado correctamente']);

    }

    public function delete(  Request $request )
    {
        $id = $request->get('id');
        $payment = Payment::find($id);
        $payment->enable = 0;
        $payment->save();

        return response()->json(['error'=>false,'message'=>'Pago dado de baja correctamente']);
    }
}
