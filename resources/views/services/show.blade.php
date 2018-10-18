@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="General" example="example1" color="primary" collapsed button>

        {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'fecha', 'cliente', 'vehículo', 'operador', 'estimado') }}

        <template slot="body">
            @foreach($general as $row)
                <tr>
                    <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>
                        <dropdown color="primary" icon="cogs">
                            <ddi to="{{ route('service.general.pay', ['id' => $row->id]) }}"
                                icon="dollar" text="Pagar">
                            </ddi>
                            <ddi to="{{ route('service.general.cancel', ['id' => $row->id]) }}"
                                icon="times" text="Cancelar">
                            </ddi>
                            <ddi to="{{ route('service.general.edit', ['id' => $row->id]) }}"
                                icon="pencil-square-o" text="Editar">
                            </ddi>
                        </dropdown>
                    </td>
                    <td>{{ fdate($row->date_service, 'j/M/y, h:i a') }}</td>
                    <td><a href="{{ route('client.details', ['id' => $row->client->id]) }}"> {{ $row->client->name }}</a></td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>{{ $row->driver->name }} {{ isset($row->helper) ? ' - ' . $row->helperr->name : '' }}</td>
                    <td>${{ $row->total }}</td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Corporaciones" example="example2" color="primary" collapsed button>

        {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'fecha', 'inventario', 'tipo', 'vehículo', 'operador', 'llave') }}

        <template slot="body">
            @foreach($corps as $row)
                <tr>
                    <td><a href="{{ route('service.corporation.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>
                        <dropdown color="primary" icon="cogs">
                            <ddi to="{{ route('service.corporation.pay', ['id' => $row->id]) }}"
                                icon="hand-peace-o" text="Liberar">
                            </ddi>
                            <ddi to="{{ route('service.corporation.edit', ['id' => $row->id]) }}"
                                icon="pencil-square-o" text="Editar">
                            </ddi>
                        </dropdown>
                    </td>
                    <td>{{ fdate($row->date_service, 'j/M/y, h:i a') }}</td>
                    <td>{{ $row->inventory }}</td>
                    <td>{{ $row->service }}</td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>{{ $row->driver->name }} {{ isset($row->helper) ? ' - ' . $row->helperr->name : '' }}</td>
                    <td>{{ $row->key }}</td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Liberados" example="example4" color="success" collapsed button>

        {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'fecha Liberación', 'inventario', 'tipo', 'marca', 'liberador', 'importe') }}

        <template slot="body">
            @foreach($release as $row)
                <tr>
                    <td><a href="{{ route('service.corporation.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>
                        <dropdown color="success" icon="cogs">
                            <ddi to="{{ route('service.corporation.printLetter', ['id' => $row->id]) }}"
                                icon="print" text="Imprimir">
                            </ddi>
                            {{-- <ddi v-if="{{ Auth::user()->level == 1 ? 1: 0 }}" to="{{ route('service.corporation.edit', ['id' => $row->id]) }}"
                                icon="pencil-square-o" text="Editar">
                            </ddi> --}}
                        </dropdown>
                    </td>
                    <td>{{ fdate($row->date_out, 'j/M/y, h:i a') }}</td>
                    <td>{{ $row->inventory }}</td>
                    <td>{{ $row->service }}</td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>{{ $row->releaser }}</td>
                    <td>${{ $row->total }} - {{ $row->pay }}</td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Pagados" example="example3" color="success" collapsed button>

        {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'fecha Pago', 'cliente', 'marca', 'importe', 'factura') }}

        <template slot="body">
            @foreach($paid as $row)
                <tr>
                    <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>
                        <dropdown color="success" icon="cogs">
                            <ddi to="{{ route('service.general.update', ['id' => $row->id]) }}"
                                icon="edit" text="Editar Pago">
                            </ddi>
                        </dropdown>
                    </td>
                    <td>{{  $row->pay_credit ? fdate($row->date_credit, 'j/M/y, h:i a') : fdate($row->date_out, 'j/M/y, h:i a')}}</td>
                    <td><a href="{{ route('client.details', ['id' => $row->client->id]) }}"> {{ $row->client->name }} </a></td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>${{ $row->total }} - {{  $row->pay_credit ? $row->pay_credit . " (". $row->pay . ")" : $row->pay }}</td>
                    <td>{{ $row->bill }}</td>
                </tr>
            @endforeach

        </template>
    </data-table>

    <data-table col="col-md-12" title="Crédito Clientes" example="example5" color="info" collapsed button>

        {{ drawHeader('ID', 'fecha servicio', 'cliente/Aseguradora', 'marca', 'importe', 'pagar', 'opciones') }}

        <template slot="body">
            @foreach($credit as $row)
                <tr>
                    <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>{{ fdate($row->date_service, 'j/M/y, h:i a') }}</td>
                    <td><a href="{{ route('client.details', ['id' => $row->client->id]) }}"> {{ $row->client->name }}</a></td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>$ {{ number_format($row->total, 2) }}</td>
                    <td>
                        @include('services/assign') &nbsp;
                    </td>
                    <td>
                        <a href="{{ route('service.general.edit', ['id' => $row->id]) }}" class="btn btn-info">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Crédito Aseguradoras" example="example6" color="info" collapsed button>

        {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'asiganci{on', 'cliente/Aseguradora', 'marca', 'importe') }}

        <template slot="body">
            @foreach($creditI as $row)
                <tr>
                    <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>
                        <dropdown color="primary" icon="cogs">
                            <ddi v-if="{{ Auth::user()->level == 1 ? 1: 0 }}" to="{{ route('service.insurer.edit', ['id' => $row->id]) }}"
                                icon="pencil-square-o" text="Editar">
                            </ddi>
                        </dropdown>
                    </td>
                    <td>{{ fdate($row->date_assignment, 'j/M/y, h:i a') }}</td>
                    <td><a href="{{ route('insurer.details', ['id' => $row->insurer->id]) }}"> {{ $row->insurer->name }}</a></td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>$ {{ number_format($row->total, 2) }}</td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cancelados" example="example7" color="danger" collapsed button>

        {{ drawHeader('ID', 'fecha', 'cliente', 'marca', 'importe', 'opciones') }}

        <template slot="body">
            @foreach($cancel as $row)
                <tr>
                    <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>{{ fdate($row->date_out, 'j/M/y, h:i a') }}</td>
                    <td>{{ $row->client->name }}</td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>$ {{ number_format($row->total, 2) }}</td>
                    <td>{{ $row->reason }}</td>
                </tr>
            @endforeach
        </template>
    </data-table>
@endsection
