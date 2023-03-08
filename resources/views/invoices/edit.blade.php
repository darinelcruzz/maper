@extends('admin')

@section('main-content')
<div class="row">
    <div class="col-md-8">
        <solid-box title="Editar factura" color="danger">
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
                            ({{ number_format($invoice->amount - $invoice->iva + $invoice->retention, 2) }})
                        </div>
                        <div class="col-md-4">
                            {!! Field::number('iva', ['label' => 'I.V.A.', 'step' => '0.01', 'min' => '0', 'v-model' => 'iva']) !!}
                            ({{ number_format($invoice->iva, 2) }})
                        </div>
                        <div class="col-md-4">
                            {!! Field::number('retention', ['step' => '0.01', 'min' => '0', 'v-model' => 'retention']) !!}
                            ({{ number_format($invoice->retention, 2) }})
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

                    <template slot="header">
                        <tr>
                            <th><small>ID</small></th>
                            <th><small>FECHA</small></th>
                            <th><small>VEHÍCULO</small></th>
                            <th style="text-align: right;"><small>MONTO</small></th>
                        </tr>
                    </template>

                    <template slot="body">
                        @foreach($services as $service)
                            <tr>
                                @if ($model == 'client')
                                    <td>
                                        <a href="{{ route('service.general.details', $service) }}"> {{ $service->id }}</a>
                                    </td>
                                    <td>{{ fdate($service->date_service, 'j/F/y') }}</td>
                                @else
                                    <td>
                                        <a href="{{ route('service.insurer.details', $service) }}"> {{ $service->id }}</a>
                                    </td>
                                    <td>{{ fdate($service->date_assignment, 'j/F/y') }}</td>
                                @endif
                                <td>{{ $service->brand }} | {{ $service->type }} | {{ $service->color }}</td>
                                <td style="text-align: right">{{ number_format($service->total, 2) }}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="2"></th>
                            <th style="text-align: right"><em><small>TOTAL SELECCIONADOS</small></em></th>
                            <td style="text-align: right">{{ number_format($services->sum('total'), 2) }}</td>
                        </tr>
                    </template>
                </data-table>
            </div>
        </solid-box>
    </div>
</div>
    @endsection
