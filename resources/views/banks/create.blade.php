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
                {!! Form::open(['method' => 'POST', 'route' => 'bank.store']) !!}

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
                {!! Form::open(['method' => 'POST', 'route' => 'bank.store']) !!}

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
                {!! Form::open(['method' => 'POST', 'route' => 'bank.format']) !!}

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
        <div class="col-md-12">
            <data-table-com title="Ingresos" example="example1" color="box-default">
                <template slot="header">
                    <tr>
                        <th>#</th>
                        <th>Folio</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Sub</th>
                        <th>Iva</th>
                        <th>Total</th>
                    </tr>
                </template>

                <template slot="body">
                    @foreach($services as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->bill }}</td>
                            <td>{{ $row->clientr->name }}</td>
                            <td>{{ $row->pay_credit ? $row->getShortDate('pay_credit') : $row->getShortDate('date_out') }}</td>
                            <td>${{ round($row->total/1.16, 2) }}</td>
                            <td>${{ round($row->total-($row->total/1.16), 2) }}</td>
                            <td>${{ $row->total }}</td>
                      </tr>
                      @php
                          $balance = $row->total++
                      @endphp
                    @endforeach
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td>
                        <td><b>Total</b></td>
                        <td><b>{{ $balance }}</b></td>
                    </tr>
                </template>
            </data-table-com>
        </div>

        <div class="col-md-12">
            <data-table-com title="Egresos" example="example1" color="box-default">
                <template slot="header">
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Sub</th>
                        <th>Iva</th>
                        <th>Total</th>
                    </tr>
                </template>

                <template slot="body">
                    @foreach($services as $row)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                      </tr>
                    @endforeach
                </template>
            </data-table-com>
        </div>
    </div>
</div>

@endsection
