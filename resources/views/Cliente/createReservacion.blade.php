@extends('layouts.tema')
@section('titulo_contenido') Registrar Reservación en Cliente @endsection
@section('subtitulo_contenido') Registrar Reservación en Sistema para un Cliente Seleccionado @endsection
@section('ruta_ref') <a href="{{ url('/admin/clients') }}">Clientes</a> @endsection
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
        {!! Form::open(['route' => ['clients.reservations.update',  $cliente, $reservacion],'method' => 'PATCH' ]) !!}
      @else
        {!! Form::open(['route' => ['clients.reservations.store',  $cliente]]) !!}
      @endif
        
        <div class="form-group">
          <label for="date" class="control-label">Fecha</label>
          {!! Form::text('date', null, ['class' => 'date form-control', 'placeholder' => 'Ingresa fecha de reservación']); !!}
        </div>
        
        <div class="form-group">
          <label for="hour" class="control-label">Hora</label>
          {!! Form::text('hour', null, ['class' => 'timepicker form-control', 'placeholder' => 'Ingresa hora de reservación']) !!}
        </div>

        <div class="form-group">
          <label for="table_id" class="control-label">Mesa</label>
          <select class="form-control" name="table_id">
            @foreach($mesas as $mesa)
              <option value="{{ $mesa->id }}">{{ 'Número de Mesa: ' . '[' . $mesa->number . '],' . ' Tamaño: ' . $mesa->size . ' Personas, Estatus: ' . $mesa->status}}</option>
            @endforeach
          </select>
        </div>
        
        <div class="form-group">
          <label for="clients_quantity" class="control-label">Personas</label>
          {!! Form::number('clients_quantity', '0', ['min' => '1', 'max' => '8', 'class' => 'form-control', 'placeholder' => 'Ingresa cantidad de personas que asistiran']) !!}
        </div>

        <div class="form-group">
          <label for="payment" class="control-label">Método de Pago</label>
          <select class="form-control" name="payment">
            @foreach($metodos as $metodo)
                <option value="{{ $metodo }}">{{ $metodo }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
            <label for="occasion" class="control-label">Motivo u ocasión especial</label>
            {!! Form::text('occasion', null, ['class' => 'form-control', 'placeholder' => 'Escriba motivo especial ej: Cumpleaños']); !!}
        </div>

        <div class="form-group">
          <label for="details" class="control-label">¿Agregar algún detalle?</label>
          {!! Form::textarea('details', null, ['class' => 'form-control', 'rows' => 2, 'maxlength' => '275', 'style' => 'resize:none']) !!}
        </div>

        <div class="tile-footer">
          <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('.date').datepicker({  
    format: 'yyyy-mm-dd'
  });
</script>

<script type="text/javascript">
  $('.timepicker').datetimepicker({
      format: 'HH:mm'
});
</script>    

@stop