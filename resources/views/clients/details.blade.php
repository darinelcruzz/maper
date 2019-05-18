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
                            <td><h3>{{ fnumber($client->serviceTotal('pending') + $client->serviceTotal('expired') + $client->serviceTotal('payment')) }}</h3></td>
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

        <data-table-com title="Vencidas ({{ count($client->expired_services) }})" example="example1" color="danger" button>
            {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'Fecha', 'Vehículo', 'Dias', 'Monto')}}
            <template slot="body">
                @foreach($client->expired_services as $row)
                  <tr>
                      <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                      <td>
                          <dropdown color="primary" icon="cogs">
                                  <ddi to="{{ route('service.general.pay', ['service' => $row->id])}}"
                                      icon="usd" text="Pagar">
                                  </ddi>
                          </dropdown>
                      </td>
                      <td>{{ fdate($row->date_service, 'j/M/y, h:i a') }}</td>
                      <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                      <td>{{ $row->getDays('date_service', $today) }}</td>
                      <td>{{ fnumber($row->total) }}</td>
                  </tr>
                @endforeach
            </template>

            <template slot="footer">
                <tr>
                    <th colspan="5"><span class="pull-right">Total</span></th>
                    <th>{{ fnumber($client->serviceTotal('expired')) }}</th>
                </tr>
            </template>
        </data-table-com>
    </div>

    <div class="col-md-6">
        <data-table-com title="Pendientes ({{ count($client->pending_services) + count($client->payment_services) }})" example="example2" color="warning" button>
            {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'Fecha', 'Vehículo', 'Dias', 'Monto')}}
            <template slot="body">
                @foreach($client->pending_services as $row)
                  <tr>
                      <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                      <td>
                          <dropdown color="primary" icon="cogs">
                                  <ddi to="{{ route('service.general.pay', ['service' => $row->id])}}"
                                      icon="usd" text="Pagar">
                                  </ddi>
                          </dropdown>
                      </td>
                      <td>{{ fdate($row->date_service, 'j/M/y, h:i a') }}</td>
                      <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                      <td>{{ $row->getDays('date_service', $today) }}</td>
                      <td>{{ fnumber($row->total) }}</td>
                  </tr>
                @endforeach
                @foreach($client->payment_services as $row)
                  <tr>
                      <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                      <td>
                          <dropdown color="primary" icon="cogs">
                                  <ddi to="{{ route('service.general.payments', ['service' => $row->id])}}"
                                      icon="plus" text="Abonar">
                                  </ddi>
                          </dropdown>
                      </td>
                      <td>{{ fdate($row->date_service, 'j/M/y, h:i a') }}</td>
                      <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                      <td>{{ $row->getDays('date_service', $today) }}</td>
                      <td>{{ fnumber($row->debt) }}</td>
                  </tr>
                @endforeach
            </template>
            <template slot="footer">
                <tr>
                    <th colspan="5"><span class="pull-right">Total</span></th>
                    <th>{{ fnumber($client->serviceTotal('pending') + $client->serviceTotal('payment')) }}</th>
                </tr>
            </template>
        </data-table-com>

        <data-table-com title="Pagadas ({{ count($client->paid_services) + count($client->soldout_services)}})" example="example3" color="success" collapsed button>
            {{ drawHeader('ID', 'Fecha Pago', 'Vehículo', 'Método', 'Monto')}}
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
                    <th colspan="3"></th>
                    <th>Total</th>
                    <th>{{ fnumber($client->serviceTotal('paid') + $client->serviceTotal('soldout')) }}</th>
                </tr>
            </template>
        </data-table-com>

    </div>
</div>
@endsection
