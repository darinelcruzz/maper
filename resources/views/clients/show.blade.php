@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Clientes" example="example1" color="default">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>R.F.C.</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Contacto</th>
                <th></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($clients as $client)
              <tr>
                  <td>{{ $client->id }}</td>
                  <td><a href="{{ route('client.details', ['id' => $client->id]) }}"> {{ $client->name }} </a></td>
                  <td>{{ $client->rfc }}</td>
                  <td>{{ $client->address ? $client->address . ' CP.' . $client->cp . ' ' . $client->city : 'n/a' }}</td>
                  <td>{{ $client->phone ? $client->phone : '' }}</td>
                  <td>{{ $client->email }}</td>
                  <td>{{ $client->contact }}  {{ $client->cellphone ? 'Cel. ' . $client->cellphone : ''}}</td>
                  <td>
                      <a href="{{ route('client.edit', ['id' => $client->id]) }}">
                          <i class="fa fa-edit"></i>
                      </a>
                      <a href="{{ route('client.delete', ['id' => $client->id]) }}">
                          <i class="fa fa-trash"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
