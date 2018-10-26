@extends('admin')

@section('main-content')

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $insurer->name }}</h3>
                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th width="50%"><h4>Saldo</h4></th>
                                    <th width="50%"><h4>Sin pagar</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><h3>{{ fnumber($insurer->total_sum) }}</h3></td>
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
                    {{ drawHeader('ID', 'Asignacion', 'Folio', 'Vehículo', '', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->credit_services as $row)
                            <tr>
                                <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_assignment, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>
                                    <dropdown color="primary" icon="cogs">
        									<ddi to="{{ route('service.insurer.updateStatus', ['service' => $row->id, 'status' => 'ingresado'])}}"
        										icon="arrow-down" text="Ingresado">
        									</ddi>
        							</dropdown>
                                </td>
                                <td>${{ $row->total }}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="5"><span class="pull-right">Total</span></th>
                            <th>{{ $insurer->serviceTotal('credit', true) }}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Ingresados  ({{ $insurer->serviceNumber('inserted') }})" example="example2" color="primary" collapsed button>
                    {{ drawHeader('ID', 'Asignacion', 'Folio', 'Vehículo', '', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->inserted_services as $row)
                            <tr>
                                <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_assignment, 'j/M/y') }}</td>
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
                                <td>${{ $row->total }}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="5"><span class="pull-right">Total</span></th>
                            <th>{{ $insurer->serviceTotal('inserted', true)}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Disputa  ({{ $insurer->serviceNumber('disputed') }})" example="example3" color="danger" collapsed button>
                    {{ drawHeader('ID', 'Asignacion', 'Folio', 'Vehículo', '', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->disputed_services as $row)
                            <tr>
                                <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_assignment, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>
                                    <dropdown color="danger" icon="cogs">
        									<ddi to="{{ route('service.insurer.updateStatus', ['service' => $row->id, 'status' => 'aprobado'])}}"
        										icon="arrow-right" text="Aprobado">
        									</ddi>
        							</dropdown>
                                </td>
                                <td>${{ $row->total }}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="5"><span class="pull-right">Total</span></th>
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
                    {{ drawHeader('ID', 'Asignacion', 'Folio', 'Vehículo', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->approved_services as $row)
                            <tr>
                                <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_assignment, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>${{ $row->total }}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="3"><a class="btn btn-xs btn-primary btn-block" href="{{ route('invoice.create', ['insurer_id' => $insurer->id]) }}">Facturar</a></th>
                            <th colspan="1"><span class="pull-right"><span class="pull-right">Total</span></span></th>
                            <th>{{ $insurer->serviceTotal('approved', true)}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Facturado  ({{ count($pendings) }})" example="example5" color="info" collapsed button>
                    {{ drawHeader('ID', 'Factura', 'Fecha', 'Ret', 'IVA','', 'Monto')}}
                    <template slot="body">
                        @php
                            $tPending = 0;
                        @endphp
                        @foreach($pendings as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td><a href="{{ route('invoice.show', ['id' => $row->id]) }}"> {{ $row->folio }} </a></td>
                                <td>{{ fdate($row->date, 'j/M/y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($row->retention) }}</td>
                                <td>{{ fnumber($row->iva) }}</td>
                                <td>
                                    <dropdown color="info" icon="cogs">
        									<ddi to="{{ route('invoice.pay', ['id' => $row->id])}}"
        										icon="dollar" text="Pagar">
        									</ddi>
        							</dropdown>
                                </td>
                                <td>{{ fnumber($row->amount) }}</td>
                                @php
                                    $tPending += $row->amount;
                                @endphp
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="6"><span class="pull-right">Total</span></th>
                            <th>{{ fnumber($tPending) }}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Pagadas ({{ count($paids) }})" example="example6" color="success" collapsed button>
                    {{ drawHeader('ID', 'Factura', 'Fecha', 'Pago', 'Ret', 'IVA', 'Monto')}}
                    <template slot="body">
                        @php
                            $tPaids = 0;
                        @endphp
                        @foreach($paids as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td><a href="{{ route('invoice.show', ['id' => $row->id]) }}"> {{ $row->folio }} </a></td>
                                <td>{{ fdate($row->date, 'j/M/y', 'Y-m-d') }}</td>
                                <td>{{ fdate($row->date_pay, 'j/M/y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($row->retention) }}</td>
                                <td>{{ fnumber($row->iva) }}</td>
                                <td>{{ fnumber($row->amount) }}</td>
                                @php
                                    $tPaids += $row->amount;
                                @endphp
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="6"><span class="pull-right">Total</span></th>
                            <th>{{ fnumber($tPaids) }}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
    </div>
</div>
@endsection
