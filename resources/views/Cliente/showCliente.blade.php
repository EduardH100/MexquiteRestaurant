@extends('layouts.tema')
@section('titulo_contenido') Instancia de Cliente @endsection
@section('subtitulo_contenido') Información Obtenida del Cliente Registrado en el Sistema @endsection
@section('ruta_ref') <a href="{{ url('/admin/clients') }}">Clientes</a> @endsection

@section('contenido')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-title-w-btn">
        <h3 class="title">{{$cliente->name}}</h3>
        <div class="btn-group">
          <a class="btn btn-primary" href="{{ route('clients.create') }}"><i class="fa fa-lg fa-plus"></i></a>
          <a class="btn btn-primary" href="{{ route('clients.edit', $cliente) }}"><i class="fa fa-lg fa-edit"></i></a>
          {!! Form::open(['route' => ['clients.destroy', $cliente->id], 'method' => 'Delete']) !!}
          {{ Form::button('<i class="fa fa-lg fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
          {!! Form::close() !!}
        </div>
      </div>
      <div class="tile-body">
        <div class="table table-responsive">
          <table class="table table-hover">
            <thead>
              <th>NOMBRE</th>
              <th>CORREO</th>
              <th>TELEFONO</th>
            </thead>
            <tbody>
              <tr>
                <td>{{ $cliente->name }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->phone }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>
  
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Reservaciones del Cliente</h3>
      <a class="btn btn-primary" href="{{ route('clients.reservations.create', $cliente) }}"><i class="fa fa-lg fa-plus"></i></a>
      <div class="table table-bordered table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>FECHA</th>
              <th>HORA</th>
              <th>QTY</th>
              <th>OCASIÓN</th>
              <th>MESA</th>
              <th>PAGO POR</th>
              <th>TOTAL</th>
              <th>DETALLE</th>
              <th>PEDIDO</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reservaciones as $reservacion)
            {!! Form::open(['route' => ['clients.reservations.destroy', $cliente->id, $reservacion->id], 'method' => 'Delete']) !!}
            <tr>
              <td> <a class="btn btn-sm btn-info" href="{{ route('reservations.show', $reservacion->id) }}">{{ $reservacion->id }}</a> </td>
              <td> {{ $reservacion->date }} </td>>
              <td> {{ $reservacion->hour }} </td>
              <td> {{ $reservacion->clients_quantity }} </td>
              <td> {{ $reservacion->occasion }}</td>
              <td> {{ $reservacion->table->number }}</td>
              <td> {{ $reservacion->payment }}</td>
              <td> {{ '$' }} </td>
              <td> {{ $reservacion->details }}</td>
              <td> {{ $reservacion->created_at }}</td>
              <td> {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) !!} </td>
            </tr>
            {!! Form::close() !!}
            @endforeach
          </tbody>
        </table>
        {{ $reservaciones->links() }}
      </div>
    </div>
  </div>

</div>
@endsection