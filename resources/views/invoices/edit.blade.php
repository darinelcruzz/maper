@extends('admin')

@section('main-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <simple-box title="Editar factura" color="danger">
            <div class="box-body">
                {!! Form::open(['method' => 'POST', 'route' => ['invoice.update', $invoice]]) !!}
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::text('folio', $invoice->folio, ['ph' => 'X000']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::date('date', $invoice->date) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::number('subtotal', ['step' => '0.01', 'min' => '0', 'v-model' => 'subtotal']) !!}
                            {{ $invoice->amount - $invoice->iva + $invoice->retention }}
                        </div>
                        <div class="col-md-4">
                            {!! Field::number('iva', ['label' => 'I.V.A.', 'step' => '0.01', 'min' => '0', 'v-model' => 'iva']) !!}
                            {{ $invoice->iva }}
                        </div>
                        <div class="col-md-4">
                            {!! Field::number('retention', ['step' => '0.01', 'min' => '0', 'v-model' => 'retention']) !!}
                            {{ $invoice->retention }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-8">
                            <h3>Total <span class="pull-right">$ @{{ total }}</span></h3>
                            <input type="hidden" name="amount" :value="total">
                        </div>
                    </div>
                    @if ($invoice->status == 'pagada')
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('method',
                                    ['Efectivo' => 'Efectivo', 'T. Debito' => 'T. Debito', 'T. Credito' => 'T. Credito',
                                    'Transferencia' => 'Transferencia', 'Cheque' => 'Cheque'], $invoice->method, ['empty' => '¿Cómo pagó?'])
                                    !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('date_pay', $invoice->date_pay) !!}
                            </div>
                        </div>
                    @endif
                    {!! Form::submit('Editar', ['class' => 'btn btn-danger btn-block']) !!}

                {!! Form::close() !!}
                <data-table example='1'>
                    {{ drawHeader('ID', 'Fecha', 'Vehiculo', 'Monto') }}
                    <template slot="body">
                        @foreach($services as $row)
                            <tr>
                                @if ($model == 'client')
                                    <td>
                                        <a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }}</a>
                                    </td>
                                    <td>{{ fdate($row->date_service, 'j/M/y') }}</td>
                                @else
                                    <td>
                                        <a href="{{ route('service.insurer.details', ['id' => $row->id]) }}"> {{ $row->id }}</a>
                                    </td>
                                    <td>{{ fdate($row->date_assignment, 'j/M/y') }}</td>
                                @endif
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>{{ fnumber($row->total) }}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="2"></th>
                            <th style="text-align: right">Total seleccionados</th>
                            <td>{{ fnumber($services->sum('total')) }}</td>
                        </tr>
                    </template>
                </data-table>
            </div>
        </simple-box>
    </div>
</div>
    @endsection
