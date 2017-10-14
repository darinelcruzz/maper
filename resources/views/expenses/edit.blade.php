@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar gastos</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'expense.change']) !!}

                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('description', isset($expense) ? $expense->description: null) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('amount', isset($expense) ? $expense->amount: null) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('bill',['no' => 'No', 'si' => 'Si'],
                                isset($expense) ? $expense->bill: null, ['empty' => '¿Facturado?'])!!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('folio', isset($expense) ? $expense->folio: null) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('type',['abono' => 'Abono', 'cargo' => 'Cargo'],
                                isset($expense) ? $expense->bill: null, ['empty' => '¿Facturado?'])!!}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="date" value="{{ date('Y-m-d\TH:i') }}">
                    <input type="hidden" name="method" value="efectivo">
                    <input type="hidden" name="id" value="{{ $expense->id }}">
                    {!! Form::submit('Editar', ['class' => 'btn btn-black btn-block']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>

        <data-table col="col-md-7" title="Gastos"
            example="example1" color="box-default">
            <template slot="header">
                <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Cargo</th>
                    <th>Abono</th>
                    <th></th>
                </tr>
            </template>

            <template slot="body">
                @foreach($expenses as $expense)
                  <tr>
                      <td>{{ $expense->id }}</td>
                      <td>{{ $expense->description }} {{ $expense->bill == 'si' ? '- Facturado' : '' }}</td>
                      <td>{{ $expense->getShortDate('date') }}</td>
                      <td>{{ $expense->type == 'cargo' ? '$' . $expense->amount : '' }}</td>
                      <td>{{ $expense->type == 'cargo' ? '' : '$' . $expense->amount }}</td>
                      <td>
                          <a href="{{ route('expense.edit', ['id' => $expense->id]) }}">
                              <i class="fa fa-edit"></i>
                          </a>
                      </td>
                  </tr>
                @endforeach
            </template>
        </data-table>
    </div>
@endsection
