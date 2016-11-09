@extends('layouts.panel')

@section('title', 'Mis datos')

@section('inscription', 'open')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Inscripción</a>
    </li>
    <li class="active">Mis datos</li>
@endsection

@section('content')
    <div class="page-header">
        <h1>
            Mis datos
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Datos que serán usados en el certificado
            </small>
        </h1>
    </div>

    <div class="space-6"></div>

    <div class="row">
        <div class="col-xs-12 table-responsive">
            <p>Los siguientes datos serán usados para coordinar la entrega de tu certificado.</p>
            <p>Por favor asegúrate de ingresar correctamente tu información.</p>
            <form action="" class="col-md-8 col-md-offset-2">
                <fieldset>
                    <div class="form-group">
                        <label for="name">Nombre completo</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input type="text" name="celular" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" class="form-control" maxlength="8" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="universidad">Universidad</label>
                        <input type="text" name="universidad" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="carrera">Carrera</label>
                        <input type="text" name="carrera" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ciclo">Ciclo</label>
                        <input type="number" min="1" max="10" name="ciclo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="egresado">
                            <input type="checkbox" name="egresado"> Marca esta casilla si ya has egresado
                        </label>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default" type="reset">Limpiar campos</button>
                        <button class="btn btn-primary" type="submit">Guardar cambios</button>
                    </div>

                </fieldset>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

@endsection