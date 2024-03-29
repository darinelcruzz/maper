@extends('admin')

@section('main-content')

<div class="row">
    <div class="col-md-12 col-lg-4">
        <div class="col-md-6 col-lg-12">
            <simple-box title="Gastos efectivo" color="danger">

                {!! Form::open(['method' => 'POST', 'route' => 'expense.store']) !!}

                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('description') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('amount', ['min' => '0', 'step' => '.01']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('bill',['no' => 'No', 'si' => 'Si'], ['empty' => '¿Facturado?'])!!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('folio') !!}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="date" value="{{ date('Y-m-d\TH:i') }}">
                    <input type="hidden" name="type" value="cargo">
                    <input type="hidden" name="method" value="e">
                    {!! Form::submit('Crear', ['class' => 'btn btn-black btn-block']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </simple-box>
        </div>
        <div class="col-md-6 col-lg-12">
            <simple-box title="Abonos" color="success" collapsed button>
                {!! Form::open(['method' => 'POST', 'route' => 'expense.store']) !!}

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('description') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('amount', ['step' => '0.01', 'min' => '0']) !!}
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <input type="hidden" name="date" value="{{ date('Y-m-d\TH:i') }}">
                    <input type="hidden" name="type" value="abono">
                    <input type="hidden" name="bill" value="0">
                    <input type="hidden" name="method" value="e">
                    {!! Form::submit('Crear', ['class' => 'btn btn-black btn-block']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </simple-box>
        </div>
        <div class="col-md-6 col-lg-12">
            <simple-box title="Imprimir" color="info" collapsed button>
                {!! Form::open(['method' => 'POST', 'route' => 'expense.format']) !!}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Field::date('date_start', $date, ['tpl' => 'templates/withicon', 'label' => 'Inicio'],
    							['icon' => 'calendar-check-o']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Field::date('date_end', $date, ['tpl' => 'templates/withicon', 'label' => 'Fin'],
    							['icon' => 'calendar-check-o']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Buscar', ['class' => 'btn btn-black btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
    <div class="col-md-12 col-lg-8">
        <data-table-com title="Movimientos" example="example1" color="default">
            <template slot="header">
                <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>Folio</th>
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
                @foreach($expenses as $row)
                    @php
                        if ($row->type != 'cargo') {
                            $temp += $row->amount;
                        } else {
                            $temp -= $row->amount;
                        }
                    @endphp
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->description }} {{ $row->bill == 'si' ? '- Facturado' : '' }}</td>
                        <td>{{ $row->folio }}</td>
                        <td>{{ $row->getShortDate('date') }}</td>
                        <td>{{ $row->type == 'cargo' ? '$' . number_format($row->amount,2) : '' }}</td>
                        <td>{{ $row->type == 'cargo' ? '' : '$' . number_format($row->amount,2) }}</td>
                        <td>{{ '$' . number_format($temp,2) }}</td>
                        <td>
                            <a href="{{ route('expense.edit', $row) }}">
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
