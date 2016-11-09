@extends('layouts.panel')

@section('title', 'Historial')

@section('inscription', 'open')
@section('history', 'active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Inscripción</a>
    </li>
    <li class="active">Historial</li>
@endsection

@section('styles')
    <style>
        .inside:focus{
            border: 1px solid #cf9018;
        }
        .img
        {
            height:400px;
            width:400px;
        }

    </style>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Historial
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando tus últimas actividades
            </small>
        </h1>
    </div>

    <div class="space-6"></div>

    <div class="row">
        <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Actividad</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Registro en la plataforma</td>
                        <td>Completo</td>
                        <td>{{ auth()->user()->created_at->format('d/m/Y h:i') }}</td>
                    </tr>
                    @foreach ($requests as $request)
                        <tr>
                            <td>Solicitud de certificado</td>
                            <td>{{ $request->state }}</td>
                            <td>{{ $request->created_at->format('d/m/Y h:i') }}</td>
                        </tr>
                        @foreach ($request->payments as $payment)
                        <tr>
                            <td>Pago por certificado (S/. {{ $payment->amount }} en {{ $payment->entity }})</td>
                            <td>{{ $payment->state }}</td>
                            <td>{{ $payment->created_at->format('d/m/Y h:i') }}</td>
                        </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection