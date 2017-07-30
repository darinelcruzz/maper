@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Unidades" example="example1" color="box-default">
        <template slot="header">
            <tr>
                <th>Número</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Editar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($units as $row)
              <tr>
                  <td>{{ $row->number }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>
                      <a href="{{ route('unit.edit', ['id' => $row->id]) }}">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
