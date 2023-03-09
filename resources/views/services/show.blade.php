@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="En corralón" example="example1" color="primary" collapsed button>

        {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'fecha servicio', 'inventario', 'tipo', 'vehículo', 'operador', 'llave') }}

        <template slot="body">
            @foreach($corporations['corralon'] as $service)
                <tr>
                    <td><a href="{{ route('service.corporation.details', $service)}}"> {{ $service->id }}  </a></td>
                    <td>
                        {{-- <dropdown color="primary" icon="cogs">
                            <ddi to="{{ route('service.corporation.pay', ['id' => $service->id]) }}"
                                icon="hand-peace-o" text="Liberar">
                            </ddi>
                            <ddi to="{{ route('service.corporation.edit', ['id' => $service->id]) }}"
                                icon="pencil-square-o" text="Editar">
                            </ddi>
                        </dropdown> --}}
                    </td>
                    <td>{{ fdate($service->date_service, 'j/M/y, h:i a') }}</td>
                    <td>{{ $service->inventory }}</td>
                    <td>{{ $service->service }}</td>
                    <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                    <td>{{ $service->driver->name }} {{ isset($service->helper) ? ' - ' . $service->helperr->name : '' }}</td>
                    <td>{{ $service->key }}</td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Liberados" example="example2" color="success" collapsed button>

        {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'fecha Liberación', 'inventario', 'tipo', 'marca', 'liberador', 'importe') }}

        <template slot="body">
            @foreach($corporations['liberado'] as $service)
                <tr>
                    <td><a href="{{ route('service.corporation.details', $service) }}"> {{ $service->id }} </a></td>
                    <td>
                        {{-- <dropdown color="success" icon="cogs">
                            <ddi to="{{ route('service.corporation.printLetter', ['id' => $service->id]) }}"
                                icon="print" text="Imprimir">
                            </ddi>
                        </dropdown> --}}
                    </td>
                    <td>{{ fdate($service->date_out, 'j/M/y, h:i a') }}</td>
                    <td>{{ $service->inventory }}</td>
                    <td>{{ $service->service }}</td>
                    <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                    <td>{{ $service->releaser }}</td>
                    <td>${{ $service->total }} - {{ $service->pay }}</td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Pagados" example="example3" color="success" collapsed button>

        {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'fecha Pago', 'cliente', 'marca', 'importe', 'factura') }}

        <template slot="body">
            @foreach($paid as $service)
                <tr>
                    <td><a href="{{ route('service.general.details',  $service->id) }}"> {{ $service->id }} </a></td>
                    <td>
                        {{-- <dropdown color="success" icon="cogs">
                            <ddi to="{{ route('service.general.update', ['id' => $service->id]) }}"
                                icon="edit" text="Editar Pago">
                            </ddi>
                        </dropdown> --}}
                    </td>
                    <td>{{  $service->pay_credit ? fdate($service->date_credit, 'j/M/y, h:i a') : fdate($service->date_out, 'j/M/y, h:i a')}}</td>
                    <td><a href="{{ route('client.details', $service) }}"> {{ $service->client->name }} </a></td>
                    <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                    <td>${{ $service->total }} - {{  $service->pay_credit ? $service->pay_credit . " (". $service->pay . ")" : $service->pay }}</td>
                    <td>{{ $service->bill }}</td>
                </tr>
            @endforeach

        </template>
    </data-table>

    <data-table col="col-md-12" title="Crédito Clientes" example="example4" color="info" collapsed button>

        {{ drawHeader('ID', 'fecha servicio', 'cliente', 'marca', 'importe', 'opciones') }}

        <template slot="body">
            @foreach($general['credito'] as $service)
                <tr>
                    <td><a href="{{ route('service.general.details', $service) }}"> {{ $service->id }} </a></td>
                    <td>{{ fdate($service->date_service, 'j/M/y, h:i a') }}</td>
                    <td><a href="{{ route('client.details', $service->client) }}"> {{ $service->client->name }}</a></td>
                    <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                    <td>$ {{ number_format($service->total, 2) }}</td>
                    <td>
                        {{-- <a href="{{ route('service.general.edit', ['id' => $row->id]) }}" class="btn btn-info">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a> --}}
                    </td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Aseguradoras" example="example5" color="info" collapsed button>

        {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'asiganción', 'cliente/Aseguradora', 'marca', 'importe') }}

        <template slot="body">
            @foreach($insurer_services as $service)
                <tr>
                    <td><a href="{{ route('service.insurer.details', $service) }}"> {{ $service->id }} </a></td>
                    <td>
                        <dropdown color="info" icon="cogs">
                            <ddi to="{{ route('service.insurer.editHour', $service->id) }}"
                                icon="clock-o" text="Hora de regreso/Extras">
                            </ddi>
                            @if (auth()->user()->level == 1)
                                <ddi to="{{ route('service.insurer.edit', $service) }}"
                                    icon="pencil-square-o" text="Editar">
                                </ddi>
                            @endif
                        </dropdown>
                    </td>
                    <td>{{ fdate($service->date_assignment, 'j/M/y, h:i a') }}</td>
                    <td><a href="{{ route('insurer.details', $service->insurer) }}"> {{ $service->insurer->name }}</a></td>
                    <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                    <td>$ {{ number_format($service->total, 2) }}</td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cancelados" example="example6" color="danger" collapsed button>

        {{ drawHeader('ID', 'fecha', 'cliente', 'marca', 'importe', 'opciones') }}

        <template slot="body">
            @foreach($general['cancelado'] as $service)
                <tr>
                    <td><a href="{{ route('service.general.details', $service) }}"> {{ $service->id }} </a></td>
                    <td>{{ fdate($service->date_out, 'j/M/y, h:i a') }}</td>
                    <td>{{ $service->client->name }}</td>
                    <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                    <td>$ {{ number_format($service->total, 2) }}</td>
                    <td>{{ $service->reason }}</td>
                </tr>
            @endforeach
        </template>
    </data-table>
@endsection
