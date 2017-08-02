@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Público en General" example="example1" color="box-danger">
        <template slot="header">
            <tr>
                <th>Fecha</th>
                <th>Inventario</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Llave</th>
                <th>Monto</th>
                <th>Opciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($public as $row)
              <tr>
                  <td>{{ $row->short_date }}</td>
                  <td>{{ $row->inventory }}</td>
                  <td>{{ $row->service }}</td>
                  <td>{{ $row->brand }}</td>
                  <td>{{ $row->model }}</td>
                  <td>{{ $row->key }}</td>
                  <td>${{ $row->amount }}</td>
                  <td>
                      <a href="{{ route('service.details', ['id' => $row->id]) }}">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                      &nbsp;&nbsp; &nbsp;&nbsp;
                      <a href="{{ route('service.edit', ['id' => $row->id]) }}">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Corporaciones" example="example2" color="box-danger" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>Fecha S.</th>
                <th>Inventario</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Llave</th>
                <th>Opciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($corps as $row)
              <tr>
                  <td>{{ $row->date_service }}</td>
                  <td>{{ $row->inventory }}</td>
                  <td>{{ $row->service }}</td>
                  <td>{{ $row->brand }}</td>
                  <td>{{ $row->model }}</td>
                  <td>{{ $row->key }}</td>
                  <td>
                      <a href="{{ route('service.details', ['id' => $row->id]) }}">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                      </a>
                      <a href="{{ route('service.edit', ['id' => $row->id]) }}">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
