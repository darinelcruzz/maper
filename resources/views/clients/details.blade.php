@extends('admin')

@section('main-content')

<div class="row">
    <div class="col-md-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $client->short_name }}</h3>
                <table style="width:100%">
                    <thead>
                        <tr>
                            <th width="45%"><h4>Saldo</h4></th>
                            <th width="25%"><h4>Sin pagar</h4></th>
                            <th width="30%"><h4>Crédito</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><h3>{{ fnumber($client->serviceTotal('pending') + $client->serviceTotal('payment')) }}</h3></td>
                            <td><h3>{{ $client->pending }}</h3></td>
                            <td><h3>{{ $client->days . ' dias' }}</h3></td>
                        </tr>
                    </tbody>
                </table>
                <br>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
        </div>

        @if(count($client->limbo_services))
          <data-table-com title="Sin completar ({{ count($client->limbo_services) }})" example="example1" color="default">
              {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'Fecha', 'Vehículo', 'Dias', 'Monto')}}
              <template slot="body">
                  @foreach($client->limbo_services as $service)
                    <tr>
                        <td><a href="{{ route('service.general.details', $service) }}"> {{ $service->id }} </a></td>
                        <td>
                            <dropdown color="default" icon="cogs">
                                    <ddi to="{{ route('service.general.pay', $service)}}"
                                        icon="usd" text="Pagar">
                                    </ddi>

                                    <ddi to="{{ route('service.general.updateStatus', [$service, 'credito'])}}"
                                      icon="arrow-down" text="Enviar a crédito">
                                    </ddi>
                            </dropdown>
                        </td>
                        <td>{{ fdate($service->date_service, 'j/M/y, h:i a') }}</td>
                        <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                        <td>{{ $service->getDays('date_service', $today) > $client->days ? 'si' : 'no' }}</td>
                        <td>
                            @if ($service->total == 0)
                                <a href="{{ route('service.general.editAmount', ['id' => $service->id]) }}"> <i style="color:#DCBF32" class="fa fa-warning"></i> </a>
                            @else
                                {{ fnumber($service->total) }}
                            @endif
                        </td>
                    </tr>
                  @endforeach
              </template>
          </data-table-com>
        @endif

        <data-table-com title="Pendientes ({{ count($client->pending_services) + count($client->payment_services) }})" example="example2" color="danger">
            {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'Fecha', 'Vehículo', 'Dias', 'Monto')}}
            <template slot="body">
                @foreach($client->pending_services as $service)
                    @php
                        $days = $service->getDays('date_service', $today);
                    @endphp
                  <tr>
                      <td><a href="{{ route('service.general.details', ['id' => $service->id]) }}"> {{ $service->id }} </a></td>
                      <td>
                          <dropdown color="danger" icon="cogs">
                                  <ddi to="{{ route('service.general.pay', ['service' => $service->id])}}"
                                      icon="usd" text="Pagar sin factura">
                                  </ddi>
                          </dropdown>
                      </td>
                      <td>{{ fdate($service->date_service, 'j/M/y, h:i a') }}</td>
                      <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                      <td>{!! $service->getExpired('date_service', $today, $client->days) !!}</td>
                      <td>
                          @if ($service->total == 0)
                              <a href="{{ route('service.general.editAmount', ['id' => $service->id]) }}"> <i style="color:#DCBF32" class="fa fa-warning"></i> </a>
                          @else
                              {{ fnumber($service->total) }}
                          @endif
                      </td>
                  </tr>
                @endforeach
                @foreach($client->payment_services as $row)
                  <tr>
                      <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                      <td>
                          <dropdown color="danger" icon="cogs">
                                  <ddi to="{{ route('service.general.payments', ['service' => $row->id])}}"
                                      icon="plus" text="Abonar">
                                  </ddi>
                          </dropdown>
                      </td>
                      <td>{{ fdate($row->date_service, 'j/M/y, h:i a') }}</td>
                      <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                      <td>{{ $row->getDays('date_service', $today) }}</td>
                      <td>{{ fnumber($row->debt) }}(pagos)</td>
                  </tr>
                @endforeach
            </template>
            <template slot="footer">
                <tr>
                    <th colspan="2">
                        <a class="btn btn-xs btn-primary btn-block" href="{{ route('client.report', [$client, 'servicios', 'pendientes']) }}">Reporte</a>
                    </th>
                    <th colspan="2">
                        <a class="btn btn-xs btn-danger btn-block" href="{{ route('invoice.make', $client) }}">Facturar</a>
                    </th>
                    <th><span class="pull-right">Total</span></th>
                    <th>{{ fnumber($client->serviceTotal('pending') + $client->serviceTotal('payment')) }}</th>
                </tr>
            </template>
        </data-table-com>

        <data-table-com title="Servicios no facturados ({{ count($client->paid_services) + count($client->soldout_services)}})" example="example4" color="warning">
            {{ drawHeader('Folio', 'Pago', 'Vehículo', 'Método', 'Monto')}}
            <template slot="body">
                @foreach($client->paid_services as $row)
                  <tr>
                      <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                      <td>{{ $row->pay_credit ? fdate($row->date_credit, 'j/M/y, h:i a') : fdate($row->date_out, 'j/M/y, h:i a') }}</td>
                      <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                      <td>{{  $row->pay_credit ? $row->pay_credit . " (". $row->pay . ")" : $row->pay }}</td>
                      <td>{{ fnumber($row->total) }}</td>
                  </tr>
                @endforeach
                @foreach($client->soldout_services as $row)
                  <tr>
                      <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                      <td>{{ fdate($row->date_credit, 'j/M/y, h:i a') }}</td>
                      <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                      <td>{{  $row->pay_credit ? $row->pay_credit . " (". $row->pay . ")" : $row->pay }}</td>
                      <td>{{ fnumber($row->total) }}</td>
                  </tr>
                @endforeach
            </template>
            <template slot="footer">
                <tr>
                    <th colspan="2">
                        <a class="btn btn-xs btn-primary btn-block" href="{{ route('client.report', [$client, 'servicios', 'pagados']) }}">Reporte</a>
                    </th>
                    <th></th>
                    <th>Total</th>
                    <th>{{ fnumber($client->serviceTotal('paid') + $client->serviceTotal('soldout')) }}</th>
                </tr>
            </template>
        </data-table-com>


    </div>

    <div class="col-md-6">

        <data-table-com title="Facturas pendientes ({{ count($client->pending_invoices) }})" example="example3" color="info">
            {{ drawHeader('factura', '<i class="fa fa-cogs"></i>', 'fecha', 'ret', 'I.V.A.', 'monto')}}
            <template slot="body">
                @foreach($client->pending_invoices as $invoice)
                  <tr>
                      <td><a href="{{ route('invoice.show', $invoice) }}"> {{ $invoice->folio }} </a></td>
                      <td>
                          <a href="{{ route('invoice.pay', $invoice) }}" class="btn btn-info btn-xs">
                              <i class="fa fa-usd"></i>
                          </a>
                      </td>
                      <td>{{ fdate($invoice->date, 'j/M/y', 'Y-m-d') }}</td>
                      <td>{{ fnumber($invoice->retention) }}</td>
                      <td>{{ fnumber($invoice->iva) }}</td>
                      <td>{{ fnumber($invoice->amount) }}</td>
                  </tr>
                @endforeach
            </template>
            <template slot="footer">
                <tr>
                    <th colspan="2">
                        <a class="btn btn-xs btn-primary btn-block" href="{{ route('client.report', [$client, 'facturas', 'pendientes']) }}">Reporte</a>
                    </th>
                    <th colspan="2"></th>
                    <th>Total</th>
                    <th>{{ fnumber($client->pending_invoices->sum('amount')) }}</th>
                </tr>
            </template>
        </data-table-com>

        <data-table-com title="Facturas pagadas ({{ count($client->paid_invoices) }})" example="example5" color="success">
            {{ drawHeader('folio', 'fecha', 'ret', 'I.V.A.', 'pago', 'monto')}}
            <template slot="body">
                @foreach($client->paid_invoices as $invoice)
                  <tr>
                      <td><a href="{{ route('invoice.show', $invoice) }}"> {{ $invoice->folio }} </a></td>
                      <td>{{ fdate($invoice->date_pay, 'j/M/y', 'Y-m-d') }}</td>
                      <td>{{ fnumber($invoice->retention) }}</td>
                      <td>{{ fnumber($invoice->iva) }}</td>
                      <td>{{ fdate($invoice->date_pay, 'j/M/y', 'Y-m-d') }}</td>
                      <td>{{ fnumber($invoice->amount) }}</td>
                  </tr>
                @endforeach
            </template>
            <template slot="footer">
                <tr>
                    <th colspan="2">
                        <a class="btn btn-xs btn-primary btn-block" href="{{ route('client.report', [$client, 'facturas', 'pagadas']) }}">Reporte</a>
                    </th>
                    <th colspan="2">
                    <th>Total</th>
                    <th>{{ fnumber($client->paid_invoices->sum('amount')) }}</th>
                </tr>
            </template>
        </data-table-com>

    </div>
</div>
@endsection
