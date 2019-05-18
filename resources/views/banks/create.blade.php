@extends('admin')

@section('main-content')

<div class="row">

    <div class="col-md-9">
        <data-table col="col-md-12" title="Ingresos" example="example1" color="success" button>
            {{ drawHeader('ID', 'Folio', 'Cliente', 'Fecha', 'Sub', 'Iva', 'Ret', 'Total') }}
            @php
                $totalAllI = 0;
                $sub = 0;
                $iva = 0;
            @endphp
            <template slot="body">
                @foreach($invoices as $invoice)
                    @php
                        $totalAllI += $invoice->amount;
                    @endphp
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td><a href="{{ route('invoice.show', ['id' => $invoice->id]) }}"> {{ $invoice->folio }} </a></td>
                        <td><a href="{{ route('insurer.details', ['id' => $invoice->insurer->id]) }}"> {{ $invoice->insurer->name }}</a></td>
                        <td>{{ fdate($invoice->date_pay, 'd/m/Y', 'Y-m-d') }}</td>
                        <td>{{ fnumber($invoice->amount - $invoice->iva) }}</td>
                        <td>{{ fnumber($invoice->iva) }}</td>
                        <td>{{ fnumber($invoice->retention) }}</td>
                        <td>{{ fnumber($invoice->amount) }}</td>
                  </tr>
                @endforeach
                @foreach($ingreses as $ingress)
                    @php
                        $totalAllI += $ingress->amount;
                    @endphp
                    <tr>
                        <td>{{ $ingress->id }}</td>
                        <td>N/A</td>
                        <td>{{ $ingress->description }}</td>
                        <td>{{ fdate($ingress->date, 'd/m/Y') }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{ fnumber($ingress->amount) }}</td>
                  </tr>
                @endforeach
            </template>
            <template slot="footer">
                <tr>
                    <td colspan="6"></td>
                    <td><b>Total:</b></td>
                    <td>$ {{ number_format($totalAllI,2) }}</td>
                </tr>
            </template>
        </data-table>

        <data-table col="col-md-12" title="Egresos" example="example2" color="danger" button>
            {{ drawHeader('ID', 'Descripción', 'Tipo', 'Fecha', 'Sub', 'Iva', 'Total') }}
            @php
                $totalAllE = 0;
                $sub = 0;
                $iva = 0;
            @endphp
            <template slot="body">
                @foreach($expenses as $expense)
                    @php
                        $totalAllE += $expense->amount;
                        $sub = $expense->amount/1.16;
                        $iva = $sub * 0.16;
                    @endphp
                    <tr>
                        <td>{{ $expense->id }}</td>
                        <td>
                            {{ $expense->description }}
                            <span class="pull-right">
                                <a href="{{ route('bank.edit', $expense) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </span>
                        </td>
                        <td>{{ $expense->type }}</td>
                        <td>{{ $expense->getShortDate('date') }}</td>
                        <td>$ {{ number_format($sub, 2) }}</td>
                        <td>$ {{ number_format($iva, 2) }}</td>
                        <td>$ {{ number_format($expense->amount, 2) }}</td>

                  </tr>
                @endforeach
            </template>
            <template slot="footer">
                <tr>
                    <td colspan="5"></td>
                    <td><b>Total:</b></td>
                    <td>$ {{ number_format($totalAllE, 2) }}</td>
                </tr>
            </template>
        </data-table>
    </div>

    <div class="col-md-3">
        <simple-box title="Gastos en Banco" color="danger">
            {!! Form::open(['method' => 'POST', 'route' => 'bank.store']) !!}
                
                {!! Field::text('description') !!}
                {!! Field::number('amount', ['min' => '0', 'step' => '.01']) !!}

                
                <input type="hidden" name="date" value="{{ date('Y-m-d\TH:i') }}">
                <input type="hidden" name="type" value="cargo">
                <input type="hidden" name="method" value="b">
                
                <div class="row">
                    <div class="col-md-7">
                        {!! Field::text('folio') !!}
                    </div>
                    <div class="col-md-5">
                        <label>&nbsp;</label><br>
                        {!! Form::submit('Crear', ['class' => 'btn btn-black btn-block']) !!}
                    </div>
                </div>
                

            {!! Form::close() !!}
        </simple-box>

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
