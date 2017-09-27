@extends('admin')

@section('main-content')

<div class="row">
    <div class="col-md-12 col-lg-4">
        <div class="col-md-6 col-lg-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Gasto</h3>
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
                    <input type="hidden" name="type" value="cargo">
                    {!! Form::submit('Crear', ['class' => 'btn btn-black btn-block']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-6 col-lg-12">
            <div class="box box-success  collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Abonos</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
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
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="date" value="{{ date('Y-m-d\TH:i') }}">
                    <input type="hidden" name="type" value="abono">
                    {!! Form::submit('Crear', ['class' => 'btn btn-black btn-block']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-md-6 col-lg-12">
            <div class="box box-info  collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Imprimir formato</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
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
    <div class="col-md-12 col-lg-8">
        <data-table-com title="Movimientos" example="example1" color="box-default">
            <template slot="header">
                <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Cargo</th>
                    <th>Abono</th>
                    <th>Saldo</th>
                    <th></th>
                </tr>
            </template>

            <template slot="body">
                @php
                    $temp = 0;
                @endphp
                @foreach($expenses as $expense)
                    @php
                        if ($expense->type != 'cargo') {
                            $temp += $expense->amount;
                        } else {
                            $temp -= $expense->amount;
                        }
                    @endphp
                    <tr>
                        <td>{{ $expense->id }}</td>
                        <td>{{ $expense->description }} {{ $expense->bill == 'si' ? '- Facturado' : '' }}</td>
                        <td>{{ $expense->getShortDate('date') }}</td>
                        <td>{{ $expense->type == 'cargo' ? '$' . $expense->amount : '' }}</td>
                        <td>{{ $expense->type == 'cargo' ? '' : '$' . $expense->amount }}</td>
                        <td>{{ '$' . $temp }}</td>
                        <td>
                            <a href="{{ route('expense.edit', ['id' => $expense->id]) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                  </tr>
                @endforeach
            </template>
        </data-table-com>
    </div>
</div>



@endsection
