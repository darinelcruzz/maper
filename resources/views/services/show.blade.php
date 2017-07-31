@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Público en General" example="example1" color="box-default">
        <template slot="header">
            <tr>
                <th>Inventario</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placas</th>
                <th>Color</th>
                <th>Llave</th>
                <th>Detalle</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($public as $row)
              <tr>
                  <td>{{ $row->inventory }}</td>
                  <td>{{ $row->service }}</td>
                  <td>{{ $row->brand }}</td>
                  <td>{{ $row->model }}</td>
                  <td>{{ $row->plate }}</td>
                  <td>{{ $row->color }}</td>
                  <td>{{ $row->key }}</td>
                  <td>
                      <a href="{{ route('service.details', ['id' => $row->id]) }}">
                          Detalles
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
