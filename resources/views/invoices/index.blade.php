@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Facturas" example="example1" color="danger">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Folio</th>
                <th>Cliente</th>
                <th>Ret</th>
                <th>IVA</th>
                <th>Monto</th>
                <th>Estado</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($invoices as $invoice)
              <tr>
                  <td>{{ $invoice->id }}</td>
                  <td>
                    <a href="{{ route('invoice.show', $invoice) }}">
                      {{ $invoice->folio }}
                    </a>
                  </td>
                  <td>{{ $invoice->insurer->name ?? $invoice->client->name }}</td>
                  <td>{{ fnumber($invoice->retention) }}</td>
                  <td>{{ fnumber($invoice->iva) }}</td>
                  <td>{{ fnumber($invoice->amount) }}</td>
                  <td>
                    <span class="label label-{{ $invoice->status == 'pagada'? 'success': 'warning' }}">{{ strtoupper($invoice->status) }}</span>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
