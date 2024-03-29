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
                    {{ drawHeader('ID', 'Asignacion', 'Folio/Inv', 'Vehículo', '', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->credit_services as $row)
                            <tr>
                                <td><a href="{{ route('service.insurer.details', $row) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_assignment, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}<br>{{ $row->inventory != 0 ? 'Inv: ' . $row->inventory :'' }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>
                                    <dropdown color="primary" icon="cogs">
        									<ddi to="{{ route('service.insurer.updateStatus', [$row, 'ingresado'])}}"
        										icon="arrow-down" text="Ingresado">
        									</ddi>
        							</dropdown>
                                </td>
                                <td>
                                    @if ($row->total == 0)
        								<a href="{{ route('service.insurer.editAmount', $row) }}"> <i style="color:#DCBF32" class="fa fa-warning"></i> </a>
        							@else
        								{{ fnumber($row->total) }}
        							@endif
                                </td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="3">
                                <a class="btn btn-xs btn-primary btn-block" href="{{ route('insurer.report', [$insurer, 'servicios', 'credito']) }}">Reporte</a>
                            </th>
                            <th colspan="2"><span class="pull-right">Total</span></th>
                            <th>{{ $insurer->serviceTotal('credit', true) }}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Ingresados  ({{ $insurer->serviceNumber('inserted') }})" example="example2" color="primary" collapsed button>
                    {{ drawHeader('ID', 'Asignacion', 'Folio/Inv', 'Vehículo', '', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->inserted_services as $row)
                            <tr>
                                <td><a href="{{ route('service.insurer.details', $row) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_assignment, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}<br>{{ $row->inventory != 0 ? 'Inv: ' . $row->inventory :'' }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>
                                    <dropdown color="primary" icon="cogs">
        									<ddi to="{{ route('service.insurer.updateStatus', [$row, 'aprobado'])}}"
        										icon="arrow-right" text="Aprobado">
        									</ddi>
        									<ddi to="{{ route('service.insurer.updateStatus', [$row, 'disputa'])}}"
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
                            <th colspan="3">
                                <a class="btn btn-xs btn-primary btn-block" href="{{ route('insurer.report', [$insurer, 'servicios', 'ingresados']) }}">Reporte</a>
                            </th>
                            <th colspan="2"><span class="pull-right">Total</span></th>
                            <th>{{ $insurer->serviceTotal('inserted', true)}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Disputa  ({{ $insurer->serviceNumber('disputed') }})" example="example3" color="danger" collapsed button>
                    {{ drawHeader('ID', 'Asignacion', 'Folio/Inv', 'Vehículo', '', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->disputed_services as $row)
                            <tr>
                                <td><a href="{{ route('service.insurer.details', $row) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_assignment, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}<br>{{ $row->inventory != 0 ? 'Inv: ' . $row->inventory :'' }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>
                                    <dropdown color="danger" icon="cogs">
        									<ddi to="{{ route('service.insurer.updateStatus', [$row, 'aprobado'])}}"
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
                            <th colspan="3">
                                <a class="btn btn-xs btn-primary btn-block" href="{{ route('insurer.report', [$insurer, 'servicios', 'disputa']) }}">Reporte</a>
                            </th>
                            <th colspan="2"><span class="pull-right">Total</span></th>
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
                    {{ drawHeader('ID', 'Asignacion', 'Folio/Inv', 'Vehículo', 'Monto')}}
                    <template slot="body">
                        @foreach($insurer->approved_services as $row)
                            <tr>
                                <td><a href="{{ route('service.insurer.details', $row) }}"> {{ $row->id }} </a></td>
                                <td>{{ fdate($row->date_assignment, 'j/M/y') }}</td>
                                <td>{{ $row->folio }}<br>{{ $row->inventory != 0 ? 'Inv: ' . $row->inventory :'' }}</td>
                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>${{ $row->total }}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="2">
                                <a class="btn btn-xs btn-primary btn-block" href="{{ route('insurer.report', [$insurer, 'servicios', 'aprobados']) }}">Reporte</a>
                            </th>
                            <th>
                                @if (auth()->user()->level == 1)
                                    <a class="btn btn-xs btn-success btn-block" href="{{ route('invoice.create', $insurer) }}">Facturar</a>
                                @endif
                            </th>
                            <th><span class="pull-right"><span class="pull-right">Total</span></span></th>
                            <th>{{ $insurer->serviceTotal('approved', true)}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Facturado  ({{ count($pendings) }})" example="example5" color="info" collapsed button>


                    @if (auth()->user()->level == 1)
                        {{ drawHeader('ID', '<i class="fa fa-usd"></i>', 'Factura', 'Fecha', 'Ret', 'IVA', 'Monto')}}
                    @else
                        {{ drawHeader('ID', 'Factura', 'Fecha', 'Ret', 'IVA', 'Monto')}}
                    @endif

                    <template slot="body">
                        @foreach($pendings as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                @if (auth()->user()->level == 1)
                                    <td>
                                        <a href="{{ route('invoice.pay', $row)}}" class="btn btn-info btn-xs">
                                            <i class="fa fa-usd"></i>
                                        </a>
                                    </td>
                                @endif
                                <td><a href="{{ route('invoice.show', $row) }}"> {{ $row->folio }} </a></td>
                                <td>{{ fdate($row->date, 'j/M/y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($row->retention) }}</td>
                                <td>{{ fnumber($row->iva) }}</td>
                                <td>{{ fnumber($row->amount) }}</td>
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="3">
                                <a class="btn btn-xs btn-primary btn-block" href="{{ route('insurer.report', [$insurer, 'facturas', 'pendientes']) }}">Reporte</a>
                            </th>
                            <th colspan="3"><span class="pull-right">Total</span></th>
                            <th>{{ fnumber($insurer->pending_invoices->sum('amount')) }}</th>
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
                        @foreach($paids as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td><a href="{{ route('invoice.show', $row) }}"> {{ $row->folio }} </a></td>
                                <td>{{ fdate($row->date, 'j/M/y', 'Y-m-d') }}</td>
                                <td>{{ fdate($row->date_pay, 'j/M/y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($row->retention) }}</td>
                                <td>{{ fnumber($row->iva) }}</td>
                                <td>{{ fnumber($row->amount) }}</td>                                
                            </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th colspan="3">
                                <a class="btn btn-xs btn-primary btn-block" href="{{ route('insurer.report', [$insurer, 'facturas', 'pagadas']) }}">Reporte</a>
                            </th>
                            <th colspan="3"><span class="pull-right">Total</span></th>
                            <th>{{ fnumber($insurer->paid_invoices->sum('amount')) }}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
    </div>
</div>
@endsection
