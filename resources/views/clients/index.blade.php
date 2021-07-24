@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Clientes" example="example1" color="danger">

        {{ drawHeader('#', '<i class="fa fa-cogs"></i>', 'nombre', 'dirección', 'contacto', 'saldo') }}

        <template slot="body">
            @foreach($clients as $client)
              <tr>
                  <td>{{ $client->id }}</td>
                  <td>
                    <dropdown icon="cogs" color="danger">
                      <ddi icon="edit" to="{{ route('client.edit', $client) }}" text="Editar"></ddi>
                      <ddi icon="trash" to="{{ route('client.destroy', $client) }}" text="Eliminar"></ddi>
                    </dropdown>
                  </td>
                  <td>
                      <a href="{{ route('client.details', $client) }}"> {{ $client->name }} </a> <br>
                      {!! $client->rfc ? $client->rfc . '<br>' : '' !!}
                      {!! $client->phone ? $client->phone . '<br>' : '' !!}
                      <span style="color: #157A47;">{{ $client->email }}</span>
                  </td>
                  <td>{{ $client->address ? $client->address . ' C.P.' . $client->cp . ' ' . $client->city : 'n/a' }}</td>
                  <td>{{ $client->contact }}  {{ $client->cellphone ? 'Cel. ' . $client->cellphone : ''}}</td>
                  <td>
                      {{ fnumber($client->serviceTotal('pending') + $client->serviceTotal('payment') + $client->invoices->where('status', 'pendiente')->sum('amount')) }} <br>
                      {{ $client->getServiceExpired($client->days) }}
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
