@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Público en General" example="example1" color="box-danger">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Inventario</th>
                <th>Marca</th>
                <th>Operador</th>
                <th>Llave</th>
                <th>Monto</th>
                <th></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($public as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->short_date }}</td>
                  <td>{{ $row->inventory }}</td>
                  <td>{{ $row->brand }}</td>
                  <td>{{ $row->driver }}</td>
                  <td>{{ $row->key }}</td>
                  <td>${{ $row->amount }}</td>
                  <td>
                      <a href="{{ route('service.public.details', ['id' => $row->id]) }}">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                      &nbsp;&nbsp;&nbsp;
                      <a href="{{ route('service.public.edit', ['id' => $row->id]) }}">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Corporaciones" example="example2" color="box-danger">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha S.</th>
                <th>Inventario</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Operador</th>
                <th>Llave</th>
                <th>Liberar </th>
                <th></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($corps as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->short_date }}</td>
                  <td>{{ $row->inventory }}</td>
                  <td>{{ $row->service }}</td>
                  <td>{{ $row->brand }}</td>
                  <td>{{ $row->driver }}</td>
                  <td>{{ $row->key }}</td>
                  <td>
                      <a href="#" class="btn btn-success">
                          <i class="fa fa-hand-peace-o" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>
                      <a href="{{ route('service.corporation.details', ['id' => $row->id]) }}">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                      &nbsp;&nbsp;&nbsp;
                      <a href="{{ route('service.corporation.edit', ['id' => $row->id]) }}">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
