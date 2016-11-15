<?php

namespace App\Http\Controllers;

use App\Speaker;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel_Style_Alignment;
use PHPExcel_Style_Border;

class RecordController extends Controller
{
    public function index()
    {
        return view('record.index');
    }

    public function show()
    {
        /*$users = User::where('role_id', 3)->get();*/
        $users = DB::table('users')
            ->leftjoin('solicitudes', 'users.id', '=', 'solicitudes.user_id')
            ->leftjoin('payments', 'solicitudes.id', '=', 'payments.solicitude_id')
            ->select(DB::raw('users.id, users.name, users.email, users.celular, users.created_at, users.egresado, solicitudes.user_id, ( select sum(payments.amount) from payments where payments.solicitude_id = solicitudes.id ) as user_amount'))
            ->where('users.role_id', 3)
            ->distinct()->get();
        //dd($users);
        return view('record.index')->with(compact('users'));
    }

    public function exportAll()
    {
        $carbon = new Carbon();
        $date = $carbon->now();
        $date = $date->format('d-m-Y');
        Excel::create('Inscritos', function ($excel) use ($date){
            $excel->sheet('Inscritos', function($sheet) use ($date){

                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    )
                );

                $styleArray = array(
                    'borders' => array(
                        'allborders' => array(
                            'style' => PHPExcel_Style_Border::BORDER_DASHDOTDOT
                        )
                    )
                );

                $dataexcel = [];
                $sheet->mergeCells('A1:F1');
                $sheet->getDefaultStyle()
                    ->getAlignment()
                    ->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("A1:F1")->applyFromArray($style);
                $sheet->getStyle()->applyFromArray($styleArray);

                $sheet->row(1, function ($row) {
                    $row->setFontFamily('New Times Roman');
                    $row->setFontSize(20);
                });
                $sheet->getDefaultStyle()->applyFromArray($styleArray);

                $sheet->row(3, function ($row) {
                    $row->setFontFamily('New Times Roman');
                    $row->setFontSize(15);
                    $row->setFontWeight('bold');
                    $row->setBackground('#ffff66');
                });
                $sheet->getDefaultStyle()->applyFromArray($styleArray);

                $users = DB::table('users')
                    ->leftjoin('solicitudes', 'users.id', '=', 'solicitudes.user_id')
                    ->leftjoin('payments', 'solicitudes.id', '=', 'payments.solicitude_id')
                    ->select(DB::raw('users.id, users.name, users.email, users.celular, users.created_at, users.egresado, solicitudes.user_id, ( select sum(payments.amount) from payments where payments.solicitude_id = solicitudes.id ) as user_amount'))
                    ->where('users.role_id', 3)
                    ->distinct()->get();

                //dd($outputs);
                array_push($dataexcel, ['REPORTE DE INSCRITOS AL '.$date]);
                array_push($dataexcel, ['', '', '', '']);
                array_push($dataexcel, ['Nombre', 'Email', 'Fecha de inscripción', 'Condición', 'Certificado', 'Pago']);
                foreach($users as $user) {
                    array_push($dataexcel, [$user->name, $user->email, date("d-m-Y", strtotime($user->created_at)), $user->egresado == 0 ? "Estudiante" : "Egresado", $user->user_id == "" ? "No solicitó" : "Si solicitó", number_format($user->user_amount,'2','.','')]);
                }

                $sheet->cells(function ($cells){
                    $cells->setBackground('#F5F5F5');
                    $cells->setAlignment('center');
                    $cells->setVAlignment('center');
                    $cells->setBorder('thin','thin','thin','thin');
                });
                $sheet->cells(function($cells) use($styleArray){
                    $cells->getDefaultStyle()->applyFromArray($styleArray);
                });
                $sheet->setWidth(
                    array(
                        'A'=> '35',
                        'B'=> '35',
                        'C'=> '35',
                        'D'=> '25',
                        'E'=> '25',
                        'F'=> '25'
                    )
                );
                $sheet->fromArray($dataexcel, null, 'A1', false, false);
                //dd($dataexcel);
            });
        })->export('xlsx');
    }

    public function exportSolicitud()
    {
        return view('record.index');
    }

}