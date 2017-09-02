@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo abono</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'payment.store']) !!}
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-4">
                            {!! Field::number('amount')!!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::select('pay',
                                ['Efectivo' => 'Efectivo', 'T. Debito' => 'T. Debito', 'T. Credito' => 'T. Credito',
                                'Transferencia' => 'Transferencia', 'Cheque' => 'Cheque', 'Credito' => 'Credito'], isset($service) ? $service->pay: null, ['empty' => '¿Cómo pagó?'])
                            !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::submit('Agregar', ['class' => 'btn btn-black btn-block']) !!}
                        </div>
                    </div>
                </div>
                  <!-- /.box-body -->
                  <div class="box-footer">

                  </div>
                  <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <data-table col="col-md-8" title="General" example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Método</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($payment as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->date_payment }}</td>
                  <td>{{ $row->amount }}</td>
                  <td>{{ $row->pay }}</td>
              </tr>
            @endforeach
        </template>
    </data-table>
@endsection
