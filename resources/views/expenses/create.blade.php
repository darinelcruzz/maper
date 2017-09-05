@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo gasto</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'expense.store']) !!}

                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('description') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('amount') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('bill',['no' => 'No', 'si' => 'Si'], ['empty' => '¿Facturado?'])!!}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="date" value="{{ date('Y-m-d\TH:i') }}">
                    {!! Form::submit('Crear', ['class' => 'btn btn-black btn-block']) !!}
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
                    <th>Monto</th>
                    <th></th>
                </tr>
            </template>

            <template slot="body">
                @foreach($expenses as $expense)
                  <tr>
                      <td>{{ $expense->id }}</td>
                      <td>{{ $expense->description }} {{ $expense->bill == 'si' ? '- Facturado' : '' }}</td>
                      <td>{{ $expense->getShortDate('date') }}</td>
                      <td>{{ $expense->amount }}</td>
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
    <div class="row">
        <div class="col-md-4">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Imprimir formato</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'expense.format']) !!}

                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('date_start', $date, ['tpl' => 'templates/withicon', 'label' => 'Inicio'],
							['icon' => 'calendar-check-o']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('date_end', $date, ['tpl' => 'templates/withicon', 'label' => 'Fin'],
							['icon' => 'calendar-check-o']) !!}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit('Buscar', ['class' => 'btn btn-black btn-block']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
