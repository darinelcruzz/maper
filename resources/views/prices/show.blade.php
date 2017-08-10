@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Precios" example="example1" color="box-default">
        <template slot="header">
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($prices as $row)
              <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->amount }}</td>
                  <td>
                      <a href="{{ route('price.edit', ['id' => $row->id]) }}">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
