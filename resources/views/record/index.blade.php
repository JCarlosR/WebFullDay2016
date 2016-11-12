@extends('layouts.panel')

@section('styles')

@endsection

@section('title','Usuarios')

@section('manage-inscription','open')

@section('manage-record','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Inscripciones</a>
    </li>
    <li class="active">Usuarios</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Lista de inscritos del II Full Day
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Visualizando los inscritos
            </small>
        </h1>
    </div>



    <div class="space-6"></div>

    <div class="row">
        <div class="col-xs-12">
            <button id="" class="btn btn-success">
                <i class="ace-icon glyphicon glyphicon-plus"></i>
                Nuevp asistente
            </button>
            <a data-url="{{ url('/send') }}" class="btn btn-info" id="send">Enviar correos</a>
        </div><!-- /.span -->
    </div><!-- /.row -->

    <div class="row">
        <div class="col-xs-12">
            <div class="space-4"></div>

            <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                <tr>
                    <th class="center">Nombre</th>
                    <th class="center">Email</th>
                    <th class="center">
                        <i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
                        Fecha de inscripción
                    </th>
                    <th></th>
                </tr>
                </thead>

                <tbody>

                @foreach( $users as $user )
                    <tr>
                        <td class="center">{{ $user->name }}</td>
                        <td class="center">{{ $user->email }}</td>
                        <td class="center">{{ date('jS F Y', strtotime($user->created_at)) }}</td>

                        <td class="center">
                            <div class="hidden-sm hidden-xs btn-group">
                                <button data-edit data-id="{{$user->id}}" class="btn btn-xs btn-info">
                                    <i class="ace-icon glyphicon glyphicon-pencil bigger-120"></i>
                                </button>
                                <button class="btn btn-xs btn-danger" data-delete data-user="{{ $user->name }}" data-id="{{ $user->id }}">
                                    <i class="ace-icon fa fa-trash bigger-120"></i>
                                </button>
                            </div>
                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="{{ url('#') }}" data-rel="tooltip" title="Edit">
                                            <span class="green">
                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                            </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete" data-delete data-name="{{ $user->name }}" data-id="{{ $user->id }}">
                                            <span class="red">
                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                            </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div><!-- /.span -->
    </div><!-- /.row -->

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/record/main.js') }}"></script>
@endsection