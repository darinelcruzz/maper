@extends('admin')

@section('main-content')

    <div id="payment" class="row">
        <div class="col-md-8">
            <solid-box title="{{ $service->client->name }} Abonos ID = {{ $service->id }}" color="default">
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Fecha y hora:</B>
                                <dd>{{ fdate($service->date_service, 'l, j F Y h:i a') }}</dd>
                            </td>
                            <td>
                                <B>Origen:</B>
                                <dd>{{ $service->origin }}</dd>
                            </td>
                            <td>
                                <B>Destino:</B>
                                <dd>{{ $service->destination }}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <B>Inventario:</B>
                                <dd>{{ $service->inventory }}</dd>
                            </td>
                            <td>
                                <B>Descripción:</B>
                                <dd>{{ $service->description }}</dd>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h4>Abonos</h4>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Método</th>
                        <th>Monto</th>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{ $payment->id }}</td>
                                <td>{{ fdate($payment->created_at, 'd/m/y') }}</td>
                                <td>{{ $payment->method }}</td>
                                <td>{{ fnumber($payment->amount) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <td></td><td></td>
                        <td><b>Total</b></td>
                        <td>{{ fnumber($payments->sum('amount')) }}</td>
                    </tfoot>
                </table>
                <hr>
                @if ($service->status == 'abonos')
                    {!! Form::open(['method' => 'POST', 'route' => ['service.general.payment', $service]]) !!}
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::number('payment', ['tpl' => 'templates/twolines', 'max' => $service->debt, 'step' => '0.01', 'min' => '0']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::select('pay',
                                ['Efectivo' => 'Efectivo', 'T. Debito' => 'T. Debito', 'T. Credito' => 'T. Credito',
                                'Transferencia' => 'Transferencia', 'Cheque' => 'Cheque'], ['empty' => '¿Cómo pagó?', 'tpl' => 'templates/twolines'])
                                !!}
                            </div>
                            <div class="col-md-2">
                                <h4><b>Total</b></h4>
                                <h4>{{ fnumber($service->total) }}</h4>
                            </div>
                            <div class="col-md-2">
                                <h4><b>Resta</b></h4>
                                <h4>{{ fnumber($service->debt) }}</h4>
                            </div>
                        </div>

                        <div class="box-footer">
                            {!! Form::submit('Abonar', ['class' => 'btn btn-black btn-block']) !!}
                        </div>
                        {!! Form::close() !!}
                @endif
            </solid-box>
        </div>
    </div>
@endsection
