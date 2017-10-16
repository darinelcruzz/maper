@extends('admin')

@section('main-content')

<div class="row">
    <div class="col-md-12 col-lg-4">
        <div class="col-md-6 col-lg-12">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Gastos en Banco</h3>
                </div>

                {!! Form::open(['method' => 'POST', 'route' => 'bank.store']) !!}
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
                                {!! Field::text('folio') !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="date" value="{{ date('Y-m-d\TH:i') }}">
                        <input type="hidden" name="type" value="cargo">
                        <input type="hidden" name="method" value="b">
                        {!! Form::submit('Crear', ['class' => 'btn btn-black btn-block']) !!}
                    </div>
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
                        <th>Ret</th>
                        <th>Total</th>
                    </tr>
                </template>
                @php
                    $totalAllI = 0;
                    $sub = 0;
                    $iva = 0;
                @endphp
                <template slot="body">
                    @foreach($services as $row)
                        @php
                            $sub = ($row->total + $row->ret)/1.16;
                            $iva = $sub * 0.16;

                            $totalAllI += $row->total;
                        @endphp
                        <tr>
                            <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                            <td>{{ $row->bill }}</td>
                            <td>{{ $row->clientr->name }}</td>
                            <td>{{ $row->getShortDate('date_out') }}</td>
                            <td>$ {{ number_format($sub, 2) }}</td>
                            <td>$ {{ number_format($iva, 2) }}</td>
                            <td>
                                @if ($row->ret >= 0)
                                    $ {{  number_format($row->ret,2) }}
                                @else
                                    @include('banks/ret')
                                @endif
                            </td>
                            <td>$ {{ number_format($row->total, 2) }}</td>
                      </tr>
                    @endforeach
                </template>
                <template slot="footer">
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td>
                        <td><b>Total:</b></td>
                        <td>$ {{ number_format($totalAllI,2) }}</td>
                    </tr>
                </template>
            </data-table-com>
        </div>

        <div class="col-md-12">
            <data-table-com title="Egresos" example="example2" color="box-default">
                <template slot="header">
                    <tr>
                        <th>#</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Sub</th>
                        <th>Iva</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </template>
                @php
                    $totalAllE = 0;
                    $sub = 0;
                    $iva = 0;
                @endphp
                <template slot="body">
                    @foreach($expenses as $row)
                        @php
                            $totalAllE += $row->amount;
                            $sub = $row->amount/1.16;
                            $iva = $sub * 0.16;
                        @endphp
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->getShortDate('date') }}</td>
                            <td>$ {{ number_format($sub, 2) }}</td>
                            <td>$ {{ number_format($iva, 2) }}</td>
                            <td>$ {{ number_format($row->amount, 2) }}</td>
                            <td>
                                <a href="{{ route('bank.edit', ['id' => $row->id]) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>

                      </tr>
                    @endforeach
                </template>
                <template slot="footer">
                    <tr>
                        <td></td><td></td><td></td><td></td>
                        <td><b>Total:</b></td>
                        <td>$ {{ number_format($totalAllE, 2) }}</td>
                    </tr>
                </template>
            </data-table-com>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="small-box bg-green">
            <div class="inner">
                <p>Saldo en Cuenta</p>
                <h3>$ {{ number_format($totalAllI - $totalAllE,2) }}</h3>
            </div>
            <div class="icon">
                <i class="fa fa-university"></i>
            </div>
        </div>
    </div>
</div>

@endsection
