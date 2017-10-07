@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Usuarios" example="example1" color="box-default">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Nivel</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($users as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->pass }}</td>
                  <td>{{ $row->level }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
