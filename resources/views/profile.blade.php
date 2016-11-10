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
            @if (session('notification'))
                <div class="alert alert-success">
                    {{ session('notification') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p>Los siguientes datos serán usados para coordinar la entrega de tu certificado.</p>
            <p>Por favor asegúrate de ingresar correctamente tu información.</p>
            <form action="" method="POST" class="col-md-8 col-md-offset-2">
                {{ csrf_field() }}
                <fieldset>
                    <div class="form-group">
                        <label for="name">Nombre completo</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input type="text" name="celular" id="celular" value="{{ old('celular', $user->celular) }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" id="dni" value="{{ old('dni', $user->dni) }}" class="form-control" maxlength="8" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="universidad">Universidad</label>
                        <input type="text" name="universidad" id="universidad" value="{{ old('universidad', $user->universidad) }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="carrera">Carrera</label>
                        <input type="text" name="carrera" id="carrera" value="{{ old('carrera', $user->carrera) }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ciclo">Ciclo</label>
                        <select name="ciclo" id="ciclo" required class="form-control">
                            <option value="">Seleccione ciclo</option>
                            <option value="1" @if ($user->ciclo == 1) selected @endif>I</option>
                            <option value="2" @if ($user->ciclo == 2) selected @endif>II</option>
                            <option value="3" @if ($user->ciclo == 3) selected @endif>III</option>
                            <option value="4" @if ($user->ciclo == 4) selected @endif>IV</option>
                            <option value="5" @if ($user->ciclo == 5) selected @endif>V</option>
                            <option value="6" @if ($user->ciclo == 6) selected @endif>VI</option>
                            <option value="7" @if ($user->ciclo == 7) selected @endif>VII</option>
                            <option value="8" @if ($user->ciclo == 8) selected @endif>VIII</option>
                            <option value="9" @if ($user->ciclo == 9) selected @endif>IX</option>
                            <option value="10" @if ($user->ciclo == 10) selected @endif>X</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="egresado">
                            <input type="checkbox" name="egresado" value="1" @if ($user->egresado) checked @endif> Marca esta casilla si ya has egresado
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
    <br><br><br>
@endsection

@section('scripts')

@endsection