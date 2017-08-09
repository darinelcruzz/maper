@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Operadores" example="example1" color="box-default">
        <template slot="header">
            <tr>
                <th>Nombre</th>
                <th>Editar</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($drivers as $row)
              <tr>
                  <td>{{ $row->name }}</td>
                  <td>
                      <a href="{{ route('driver.edit', ['id' => $row->id]) }}">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
