<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Solicitude;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;


class PaymentController extends Controller
{
    public function show()
    {
        $solicitudes = Solicitude::where('enable',1)->where('user_id',Auth()->user()->id)->get();
        $array_solicitudes= [];

        if( count($solicitudes) != 0 )
        {
            foreach ( $solicitudes as $solicitude ) {
                $total_payment = 0;
                $payment_date = '';
                $hide = 0;
                $history = 0;

                $payment = Payment::where('enable',1)->where('solicitude_id',$solicitude->id)->orderBy('operation_date')->first();

                if( $payment != null ) {
                    foreach ($solicitude->payments as $payment)
                        if ($payment->enable == 1)
                            $total_payment += $payment->amount;

                    // Last payment date
                    $payment_date = $payment->operation_date;
                    $payment_date = new Carbon($payment_date);
                    $payment_date = $payment_date->format('jS \o\f F, Y');
                }

                // Solicitude payment
                $solicitude_date = $solicitude->created_at;
                $solicitude_date = new Carbon($solicitude_date);
                $solicitude_date = $solicitude_date->format('jS \o\f F, Y');
                if( $total_payment == $solicitude->certificate->cost )
                    $hide = 1;
                if( $solicitude->state=='Anulado' )
                    $history=1;
                $array_solicitudes[] = [$solicitude,number_format($total_payment,'2','.',''),$solicitude_date,$payment_date,$hide,$history];
            }
        }

        return view('payment.show')->with(compact('array_solicitudes'));
    }

    public function index( $id )
    {
        $solicitude_id = $id;
        $solicitude = Solicitude::find($solicitude_id);
        $certificate_name = $solicitude->certificate->type;

        $today = new Carbon();
        $today = $today->format('Y-m-d');
        $hide = 0;
        if( $solicitude->state=="Anulado" || $solicitude->state=='Pagado')
            $hide = 1;

        $payments = Payment::where('enable',1)->where('solicitude_id',$solicitude_id)->get();
        $array_payments = [];

        if( count($payments) != 0 )
            foreach ( $payments as $payment ) {
                $operation_date = new Carbon($payment->operation_date);
                $operation_date = $operation_date->format('jS \o\f F, Y');
                $array_payments [] = [$payment,$operation_date];
            }

        return view('payment.index')->with(compact('array_payments','today','solicitude_id','certificate_name','hide'));
    }

    public function create( Request $request )
    {
        $solicitude_id = $request->get('solicitude_id');
        $entity = $request->get('entity');
        $document = $request->file('payment_file');
        $amount = $request->get('amount');
        $operation = $request->get('operation');
        $operation_date = $request->get('operation_date');

        $solicitude = Solicitude::find($solicitude_id);
        $payment = Payment::where('solicitude_id', $solicitude_id)->where('enable',1)->first();

        $total_amount = 0;
        $certificate_cost = $solicitude->certificate->cost;

        if ($payment != null) {
            $total_payment = 0;
            foreach ( $solicitude->payments as $payment )
                if ( $payment->enable == 1 )
                    $total_payment += $payment->amount;

            $total_amount = $total_payment;
            if ( $total_payment + $amount > $certificate_cost )
                return response()->json(['error' => true, 'message' => 'La sumatoria de los montos depositados excede el precio del certificado, su deuda es S/. ' . number_format($certificate_cost - $total_payment, 2, '.', '')]);
        }else {
            if ($amount > $certificate_cost)
                return response()->json(['error' => true, 'message' => 'El monto ingresado excede al precio del certificado, su deuda es S/. '.$certificate_cost ]);
        }
        $date = new Carbon($operation_date);
        $date = $date->format('d-m-Y');
        $payment = Payment::create([
            'solicitude_id'=>$solicitude_id,
            'entity'=>$entity,
            'amount'=>$amount,
            'operation'=>$operation,
            'operation_date'=>$date
        ]);

        if( $document )
        {
            $path = public_path().'/assets/img/payment';
            $extension = $document->getClientOriginalExtension();
            $fileName = $payment->id . '.' . $extension;
            $document->move($path, $fileName);
            $payment->payment_file = $fileName;
        }

        $payment->save();

        if ( $total_amount+$amount == $certificate_cost  ) {
            $solicitude->state = 'Pagado';
            $solicitude->save();
            $page = 'pagos';
            if( Auth()->user()->role_id != 3 )
                $page = 'admin/pagos';

            return response()->json(['error' => true, 'refreshing' => true, 'message' => 'Pago registrado correctamente, Usted ya no tiene deudas','page'=>$page]);
        }
        return response()->json(['error'=>false,'message'=>'Pago registrado correctamente']);
    }

    public function delete(  Request $request )
    {
        $id = $request->get('id');
        $payment = Payment::find($id);
        $solicitude_id = $payment->solicitude->id;
        $solicitude = Solicitude::find($solicitude_id);
        $solicitude->state = 'Pendiente';
        $payment->enable = 0;
        $solicitude->save();
        $payment->save();

        return response()->json(['error'=>false,'message'=>'Pago anulado correctamente']);
    }

    public function adminIndex()
    {
        $solicitudes = Solicitude::where('enable',1)->where('state','Pendiente')->orderBy('created_at')->get();
        $array_solicitudes = [];
        $today = new Carbon();
        $today = $today->format('Y-m-d');
        if( count($solicitudes) != 0 ) {
            foreach ($solicitudes as $solicitude) {
                $total_payment = 0;
                $state = 'Pendiente';
                if( count($solicitude->payments) != 0 ) {
                    foreach ($solicitude->payments as $payment) {
                        if ($payment->enable == 1)
                            $total_payment += $payment->amount;
                    }

                    if ( $solicitude->certificate->cost == $total_payment )
                        $state = 'Pagado';
                }
                $array_solicitudes[] = [$solicitude,$total_payment,$state];
            }
        }
        return view('payment.admin.show')->with(compact('array_solicitudes','today'));
    }
}
