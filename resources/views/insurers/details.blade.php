@extends('admin')

@section('main-content')

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $insurer->business_name }}</h3>
                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th width="50%"><h4>Saldo</h4></th>
                                    <th width="50%"><h4>Sin pagar</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><h3>${{ $insurer->serviceTotal('credit') + $insurer->serviceTotal('expired') }}</h3></td>
                                    <td><h3>{{ $insurer->pending }}</h3></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Vencidas" example="example1" color="danger" button>
                    <template slot="header">
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Vehículo</th>
                            <th>Dias</th>
                            <th>Monto</th>
                        </tr>
                    </template>

                    <template slot="body">
                        @foreach($insurer->expired_services as $row)
                          <tr>
                              <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                              <td>{{ fdate($row->date_service, 'j/M/y, h:i a') }}</td>
                              <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                              <td>{{ $row->getDays('date_service') }}</td>
                              <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                          </tr>
                        @endforeach
                    </template>

                    <template slot="footer">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>${{ $insurer->serviceTotal('expired')}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Credito" example="example2" color="warning" button>
                    <template slot="header">
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Vehículo</th>
                            <th>Dias</th>
                            <th>Monto</th>
                        </tr>
                    </template>

                    <template slot="body">
                        @foreach($insurer->credit_services as $row)
                          <tr>
                              <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                              <td>{{ fdate($row->date_service, 'j/M/y, h:i a') }}</td>
                              <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                              <td></td>
                              <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                          </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>${{ $insurer->serviceTotal('credit') }}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Pagadas" example="example3" color="success" collapsed button>
                    <template slot="header">
                        <tr>
                            <th>ID</th>
                            <th>Fecha Pago</th>
                            <th>Vehículo</th>
                            <th>Método</th>
                            <th>Monto</th>
                        </tr>
                    </template>

                    <template slot="body">
                        @foreach($insurer->paid_services as $row)
                          <tr>
                              <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                              <td>{{ $row->pay_credit ? fdate($row->date_credit, 'j/M/y, h:i a') : fdate($row->date_out, 'j/M/y, h:i a') }}</td>
                              <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                              <td>{{  $row->pay_credit ? $row->pay_credit . " (". $row->pay . ")" : $row->pay }}</td>
                              <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                          </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>{{ $insurer->serviceTotal('paid', true)}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
    </div>
</div>
@endsection
