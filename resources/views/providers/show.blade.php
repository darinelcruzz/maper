@extends('admin')

@section('main-content')
    <data-table col="col-md-12" title="Proveedores" example="example1" color="default">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>R.F.C.</th>
                <th>Ciudad</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Contacto</th>
                <th></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($providers as $provider)
              <tr>
                  <td>{{ $provider->id }}</td>
                  <td>{{ $provider->name }}</td>
                  <td>{{ $provider->rfc }}</td>
                  <td>{{ $provider->address }}</td>
                  <td>{{ $provider->phone }}</td>
                  <td>{{ $provider->email }}</td>
                  <td>{{ $provider->contact }}</td>
                  <td>
                      <a href="{{ route('provider.edit', ['id' => $provider->id]) }}">
                          <i class="fa fa-edit"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
