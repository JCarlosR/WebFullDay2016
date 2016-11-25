@extends('layouts.panel')

@section('title','Inscripcion')

@section('manage-inscription','open')
@section('make-inscription','active')

@section('menu-active')
    <li>
        <i class="ace-icon fa fa-home home-icon"></i>
        <a href="#">Inscripciones</a>
    </li>
    <li class="active">Registrar Nuevo Asistente</li>
@endsection

@section('content')
<div class="row">
        <div class="col-xs-10 table-responsive">
            <p>Por favor asegúrate de ingresar correctamente la información.</p>
            <form action="{{ url('/inscription/registrar') }}" method="POST" class="col-md-8 col-md-offset-2">
                {{ csrf_field() }}
                <fieldset>
                    <div class="form-group">
                        <label for="name">Nombre completo</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <input type="text" name="celular" id="celular" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" name="dni" id="dni" class="form-control" maxlength="8" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="universidad">Universidad</label>
                        <input type="text" name="universidad" id="universidad" value="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="carrera">Carrera</label>
                        <input type="text" name="carrera" id="carrera" value="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="ciclo">Ciclo</label>
                        <select name="ciclo" id="ciclo" required class="form-control">
                            <option value="">Seleccione ciclo</option>
                            <option value="1">I</option>
                            <option value="2">II</option>
                            <option value="3">III</option>
                            <option value="4">IV</option>
                            <option value="5">V</option>
                            <option value="6">VI</option>
                            <option value="7">VII</option>
                            <option value="8">VIII</option>
                            <option value="9">IX</option>
                            <option value="10">X</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ciclo">Hitos de Asistencia</label>
                        <select name="hito" id="hito" required class="form-control">
                            <option value="">Seleccione Hito</option>
                        @foreach( $hitos as $data )      
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="egresado">
                            <input type="checkbox" onclick="egre();" id="egresado" name="egresado" value="1"> Marca esta casilla si ya has egresado
                        </label>
                    </div>
                    @foreach( $certificates as $data2)
                          <div class="form-group">
                               <label><input type="checkbox"  name="certific[]" value="{{ $data2->id }}"> Certificado de {{ $data2->type }} /<b><font SIZE=3 color="purple">Costo : S/.{{ $data2->cost }} </font></b></label>
                          </div>
                    @endforeach
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
    <script src="{{asset('assets/js/inscription/index.js')}}"></script>
@endsection