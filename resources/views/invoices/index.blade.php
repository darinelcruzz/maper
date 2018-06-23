@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="Facturas" example="example1" color="default">
        <template slot="header">
            <tr>
                <th>#</th>
                <th>Folio</th>
                <th>Aseguradora</th>
                <th>Ret</th>
                <th>IVA</th>
                <th>Monto</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </template>

        <template slot="body">
            @foreach($invoices as $invoice)
              <tr>
                  <td>{{ $invoice->id }}</td>
                  <td>{{ $invoice->folio }}</td>
                  <td>{{ $invoice->insurer->name }}</td>
                  <td>{{ fnumber($invoice->retention) }}</td>
                  <td>{{ fnumber($invoice->iva) }}</td>
                  <td>{{ fnumber($invoice->amount) }}</td>
                  <td>{{ $invoice->status }}</td>
                  <td></td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
