@extends('admin')

@section('main-content')

<div class="row">
    <div class="col-md-8">
        <data-table-com title="Factura {{ $invoice->folio }} - {{ $invoice->{$model}->name }}" example="example1" color="primary">
            {{ drawHeader('ID', 'Asignacion', 'Folio', 'Vehículo', 'Monto')}}
            <template slot="body">
                @foreach($services as $service)
                    <tr>
                        @if ($model == 'client')
                            <td>
                                <a href="{{ route('service.general.details', $service) }}"> {{ $service->id }}</a>
                            </td>
                            <td>{{ fdate($service->date_service, 'j/M/y') }}</td>
                        @else
                            <td>
                                <a href="{{ route('service.insurer.details', $service) }}"> {{ $service->id }}</a>
                            </td>
                            <td>{{ fdate($service->date_assignment, 'j/M/y') }}</td>
                        @endif
                        <td>{{ $service->folio }}</td>
                        <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                        <td>{{ fnumber($service->total) }}</td>
                    </tr>
                @endforeach
            </template>
        </data-table-com>
    </div>
    <div class="col-md-4">
        <data-table-com title="Datos" example="example2" color="primary">

            <template slot="body">
                <tr>
                    <td><B>Fecha:</B><dd>{{ fdate($invoice->date, 'd-M-Y', 'Y-m-d') }}</dd></td>
                    <td><B>Estado:</B><dd>{{ $invoice->status }}</dd></td>
                    <td><B>Fecha Pago:</B><dd>{{ $invoice->date_pay == NULL ? '' : fdate($invoice->date_pay, 'd-M-Y', 'Y-m-d') }}</dd></td>
                <tr>
                    <td><B>Retención:</B><dd>{{ fnumber($invoice->retention) }}</dd></td>
                    <td><B>IVA:</B><dd>{{ fnumber($invoice->iva) }}</dd></td>
                    <td><B>Total:</B><dd>{{ fnumber($invoice->amount) }}</dd></td>
                </tr>
                </tr>
            </template>
        </data-table-com>
    </div>
</div>
@endsection
