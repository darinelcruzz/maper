@extends('admin')

@section('main-content')



    <data-table col="col-md-12" title="Corporaciones" example="example2" color="box-primary" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Inventario</th>
                <th>Tipo</th>
                <th>Vehículo</th>
                <th>Operador</th>
                <th>Llave</th>
                <th>Opciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($corps as $row)
              <tr>
                  <td><a href="{{ route('service.corporation.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                  <td>{{ $row->short_date }}</td>
                  <td>{{ $row->inventory }}</td>
                  <td>{{ $row->service }}</td>
                  <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                  <td>{{ $row->driverr->name }}</td>
                  <td>{{ $row->key }}</td>
                  <td>
                      <a href="{{ route('service.corporation.pay', ['id' => $row->id]) }}" class="btn btn-success">
                          <i class="fa fa-hand-peace-o" aria-hidden="true"></i>
                      </a>
                      <a href="{{ route('service.corporation.edit', ['id' => $row->id]) }}" class="btn btn-info">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
    <data-table col="col-md-12" title="Pagados" example="example3" color="box-warning" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha Pago</th>
                <th>Inventario</th>
                <th>Client</th>
                <th>Marca</th>
                <th>Importe</th>
                <th>Opciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($paid as $row)
              <tr>
                  <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                  <td>{{ $row->short_date_out }}</td>
                  <td>{{ $row->inventory }}</td>
                  <td>{{ $row->service }}</td>
                  <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                  <td>${{ $row->amount + $row->maneuver + $row->pension - $row->discount }}</td>
                  <td>
                      <a href="{{ route('service.corporation.edit', ['id' => $row->id]) }}" class="btn btn-info">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
    <data-table col="col-md-12" title="Liberados" example="example4" color="box-success" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha Liberación</th>
                <th>Inventario</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Liberador</th>
                <th>Importe</th>
                <th>Opciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($release as $row)
              <tr>
                  <td><a href="{{ route('service.corporation.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                  <td>{{ $row->short_date_out }}</td>
                  <td>{{ $row->inventory }}</td>
                  <td>{{ $row->service }}</td>
                  <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                  <td>{{ $row->releaser }}</td>
                  <td>${{ $row->amount + $row->maneuver + $row->pension - $row->discount }}</td>
                  <td>
                      <a href="{{ route('service.corporation.edit', ['id' => $row->id]) }}" class="btn btn-info">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
