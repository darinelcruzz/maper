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
                                    <td><h3>${{ $insurer->serviceTotal('credit') + $insurer->serviceTotal('inserted') + $insurer->serviceTotal('disputed') + $insurer->serviceTotal('approved') + $insurer->serviceTotal('invoiced') }}</h3></td>
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
                <data-table-com title="Credito ({{ $insurer->serviceNumber('credit') }})" example="example1" color="primary" collapsed button>
                    {{ drawHeader('ID', 'Fecha serv', 'Folio', 'Vehículo', '', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->credit_services as $row)
                            <tr>
                                <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_service, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>
                                    <dropdown color="primary" icon="cogs">
        									<ddi to="{{ route('service.insurer.updateStatus', ['service' => $row->id, 'status' => 'ingresado'])}}"
        										icon="arrow-down" text="Ingresado">
        									</ddi>
        							</dropdown>
                                </td>
                                <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="5">Total</th>
                            <th>{{ $insurer->serviceTotal('credit', true) }}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Ingresados  ({{ $insurer->serviceNumber('inserted') }})" example="example2" color="primary" collapsed button>
                    {{ drawHeader('ID', 'Fecha serv', 'Folio', 'Vehículo', '', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->inserted_services as $row)
                            <tr>
                                <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_service, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>
                                    <dropdown color="primary" icon="cogs">
        									<ddi to="{{ route('service.insurer.updateStatus', ['service' => $row->id, 'status' => 'aprobado'])}}"
        										icon="arrow-right" text="Aprobado">
        									</ddi>
        									<ddi to="{{ route('service.insurer.updateStatus', ['service' => $row->id, 'status' => 'disputa'])}}"
        										icon="arrow-down" text="Disputa">
        									</ddi>
        							</dropdown>
                                </td>
                                <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="5">Total</th>
                            <th>{{ $insurer->serviceTotal('inserted', true)}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Disputa  ({{ $insurer->serviceNumber('disputed') }})" example="example3" color="danger" collapsed button>
                    {{ drawHeader('ID', 'Fecha serv', 'Folio', 'Vehículo', '', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->disputed_services as $row)
                            <tr>
                                <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_service, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>
                                    <dropdown color="danger" icon="cogs">
        									<ddi to="{{ route('service.insurer.updateStatus', ['service' => $row->id, 'status' => 'aprobado'])}}"
        										icon="arrow-right" text="Aprobado">
        									</ddi>
        							</dropdown>
                                </td>
                                <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="5">Total</th>
                            <th>{{ $insurer->serviceTotal('disputed', true)}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Aprobado  ({{ $insurer->serviceNumber('approved') }})" example="example4" color="warning" collapsed button>
                    {{ drawHeader('ID', 'Fecha serv', 'Folio', 'Vehículo', 'Factura', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->approved_services as $row)
                            <tr>
                                <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_service, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>@include('insurers/bill')</td>
                                <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="5">Total</th>
                            <th>{{ $insurer->serviceTotal('approved', true)}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Facturado  ({{ $insurer->serviceNumber('invoiced') }})" example="example5" color="info" collapsed button>
                    {{ drawHeader('ID', 'Fecha serv', 'Folio', 'Vehículo', 'Factura', '', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->invoiced_services as $row)
                            <tr>
                                <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_service, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>{{ $row->bill }}</td>
                                <td></td>
                                <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="6">Total</th>
                            <th>{{ $insurer->serviceTotal('invoiced', true)}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Pagadas ({{ $insurer->serviceNumber('paid') }})" example="example6" color="success" collapsed button>
                    {{ drawHeader('ID', 'Fecha Pago', 'Folio', 'Vehículo', 'Método', 'Factura', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->paid_services as $row)
                            <tr>
                                <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_credit, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>{{  $row->pay_credit ? $row->pay_credit . " (". $row->pay . ")" : $row->pay }}</td>
                                <td>{{ $row->bill }}</td>
                                <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="6">Total</th>
                            <th>{{ $insurer->serviceTotal('paid', true)}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
    </div>
</div>
@endsection
