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
                <th>Opciones</th>
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
                  <td align="right">
                      <a href="{{ route('service.public.pay', ['id' => $row->id]) }}" class="btn btn-success">
                          <i class="fa fa-check" aria-hidden="true"></i>
                      </a>
                      <a href="#" class="btn btn-danger">
                          <i class="fa fa-times" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>
                      <a href="{{ route('service.public.details', ['id' => $row->id]) }}" class="btn btn-info">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                      <a href="{{ route('service.public.edit', ['id' => $row->id]) }}"  class="btn btn-info">
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
                <th>Fecha</th>
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
                  <td align="right">
                      <a href="#" class="btn btn-success">
                          <i class="fa fa-hand-peace-o" aria-hidden="true"></i>
                      </a>
                  </td>
                  <td>
                      <a href="{{ route('service.corporation.details', ['id' => $row->id]) }}" class="btn btn-info">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                      <a href="{{ route('service.corporation.edit', ['id' => $row->id]) }}" class="btn btn-info">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
