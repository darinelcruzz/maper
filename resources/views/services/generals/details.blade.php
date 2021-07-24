@extends('admin')

@section('htmlheader_title', 'Servicios | Generales')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="ID #{{ $service->id }}" color="danger">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="4"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;&nbsp;SERVICIO</th>
                        </tr>
                        <tr>
                            <th style="width: 20%;"><small>DESCRIPCIÓN</small></th>
                            <th style="width: 40%;"><small>FECHA</small></th>
                            <th style="width: 20%;"><small>HORA</small></th>
                            <th style="width: 20%;"><small>INVENTARIO</small></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ strtoupper($service->service . ' | ' . $service->description) }}</td>
                            <td>
                                {!! Form::open(['method' => 'POST', 'route' => 'admin.cash']) !!}
                                    <input type="hidden" name="date" value="{{ date('Y-m-d', strtotime($service->date_service)) }}">
                                    <button type="submit" style="all: unset;color: #3c8dbc;-webkit-text-fill-color: #3c8dbc;cursor: pointer;">
                                        {{ ucfirst(fdate($service->date_service, 'l j \d\e F, Y')) }}
                                    </button>
                                {!! Form::close() !!}
                            </td>
                            <td>{{ fdate($service->date_service, 'h:i a') }}</td>
                            <td>{{ $service->inventory ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th colspan="4"><i class="fa fa-car" aria-hidden="true"></i>&nbsp;&nbsp;VEHÍCULO</th>
                        </tr>
                        <tr>
                            <th><small>CATEGORÍA</small></th>
                            <th><small>MARCA</small></th>
                            <th><small>TIPO</small></th>
                            <th><small>COLOR</small></th>
                        </tr>
                        <tr>
                            <td>{{ strtoupper($service->category) }}</td>
                            <td>{{ $service->brand }}</td>
                            <td>{{ $service->type }}</td>
                            <td>{{ $service->color ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th><small>CARGA</small></th>
                            <th><small>PLACAS</small></th>
                            <th colspan="2"><small>LLAVES</small></th>
                        </tr>
                        <tr>
                            <td>{{ $service->load ?? 'N/A' }}</td>
                            <td>{{ $service->plate ?? 'N/A' }}</td>
                            <td colspan="2">{{ $service->key ?? 'NO' }}</td>
                        </tr>

                        <tr>
                            <th colspan="4"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;UBICACIÓN</th>
                        </tr>
                        <tr>
                            <th><small>CLIENTE</small></th>
                            <th><small>ORIGEN</small></th>
                            <th><small>DESTINO</small></th>
                            <th><small>KILÓMETROS</small></th>
                        </tr>
                        <tr>
                            <td><a href="{{ route('client.details', $service->client) }}">{{ $service->client->name }}</a></td>
                            <td>{{ $service->origin }}</td>
                            <td>{{ $service->destination }}</td>
                            <td>{{ $service->km }}</td>
                        </tr>

                        <tr>
                            <th colspan="4"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;&nbsp;UNIDAD</th>
                        </tr>
                        <tr>
                            <th><small>UNIDAD</small></th>
                            <th><small>REGRESO</small></th>
                            <th><small>OPERADOR</small></th>
                            <th><small>APOYO</small></th>
                        </tr>
                        <tr>
                            <td>{{ $service->unit->description ?? '' }}</td>
                            <td>{{ fdate($service->date_return, 'l, j F Y h:i a') }}</td>
                            <td>{{ $service->driver->name }}</td>
                            <td>{{ $service->helperr->name ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>
                                <a href="{{ route('service.general.edit', $service) }}" class="btn btn-danger btn-sm"><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;EDITAR</a>
                            </th>
                            <th></th>
                            <th><big>TOTAL</big></th>
                            <th><big>$ {{ number_format($service->total, 2) }}</big></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><big>{{ $service->bill ? 'Fac. ' . $service->bill : '' }}</big></th>
                        </tr>
                    </tbody>
                </table>
            </solid-box>
        </div>
    </div>
@endsection
