@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="{{ $client->name }}" example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Vehículo</th>
                <th>Operador</th>
                <th>Monto</th>
                <th>Status</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($services as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->getShortDate('date_service') }}</td>
                  <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                  <td>{{ $row->driverr->name }}</td>
                  <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                  <td>{{ $row->status }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
