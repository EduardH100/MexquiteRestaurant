@extends('layouts.tema') 

@section('titulo_contenido') Registrar Alumno @endsection
@section('subtitulo_contenido') Registrar Alumno en BD @endsection
@section('ruta_ref') <a href="{{ url('/alumnos') }}">Alumnos</a> @endsection

@section('contenido')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      
       @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
      @endif
      
      
      <h3 class="tile-title">Rellene los Campos para Reservación</h3>
      <div class="tile-body">

        @if(isset($reservacion))
          {!! Form::model($reservación, ['route' => ['reservations.update', $reservacion->id], 'method' => 'PATCH']) !!}
        @else
          {!! Form::open(['route' => 'reservations.store']) !!}
        @endif 
          {{-- csrf_field() --}}
          <div class="form-group">
            <label for="nombre" class="control-label">Nombre</label>
            {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del alumno']); !!}
          </div>
          <div class="form-group">            
            <label for="codigo" class="control-label">Código</label>
              {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Ingresa código del alumno']) !!}
          </div>
          <div class="form-group">
            <label for="carrera" class="control-label">Carrera</label>
              {!! Form::text('carrera', null, ['class' => 'form-control', 'placeholder' => 'Ingresa carrera del alumno']) !!}
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@stop