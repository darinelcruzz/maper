@extends('admin')

@section('htmlheader_title', 'Servicios | Aseguradoras')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="{{ 'ID #' . $insurerService->id }}" color="danger">
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
                            <td>{{ $insurerService->description }}</td>
                            <td>
                                {!! Form::open(['method' => 'POST', 'route' => 'admin.cash']) !!}
                                    <input type="hidden" name="date" value="{{ date('Y-m-d', strtotime($insurerService->date_assignment)) }}">
                                    <button type="submit" style="all: unset;color: #3c8dbc;-webkit-text-fill-color: #3c8dbc;cursor: pointer;">
                                        {{ ucfirst(fdate($insurerService->date_assignment, 'l j \d\e F, Y')) }}
                                    </button>
                                {!! Form::close() !!}
                            </td>
                            <td>{{ fdate($insurerService->date_assignment, 'h:i a') }}</td>
                            <td>{{ $insurerService->inventory ?? 'N/A' }}</td>
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
                            <td>{{ strtoupper($insurerService->category) }}</td>
                            <td>{{ $insurerService->brand }}</td>
                            <td>{{ $insurerService->type }}</td>
                            <td>{{ $insurerService->color ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th><small>CARGA</small></th>
                            <th><small>PLACAS</small></th>
                            <th colspan="2"><small>LLAVES</small></th>
                        </tr>
                        <tr>
                            <td>{{ $insurerService->load ?? 'N/A' }}</td>
                            <td>{{ $insurerService->plate ?? 'N/A' }}</td>
                            <td colspan="2">{{ $insurerService->key ?? 'NO' }}</td>
                        </tr>

                        <tr>
                            <th colspan="4"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;UBICACIÓN</th>
                        </tr>
                        <tr>
                            <th colspan="2"><small>ORIGEN</small></th>
                            <th colspan="2"><small>DESTINO</small></th>
                        </tr>
                        <tr>
                            <td colspan="2">{{ $insurerService->origin }}</td>
                            <td colspan="2">{{ $insurerService->destination }}</td>
                        </tr>
                        <tr>
                            <th><small>KILÓMETROS</small></th>
                            <th><small>USUARIO</small></th>                            
                            <th><small>FECHA CONTACTO</small></th>                            
                            <th><small>HORA CONTACTO</small></th>                            
                        </tr>
                        <tr>
                            <td>{{ $insurerService->km }}</td>
                            <td>{{ $insurerService->user }}</td>
                            <td>{{ fdate($insurerService->date_contact, 'l, j F Y') }}</td>
                            <td>{{ fdate($insurerService->date_contact, 'h:i a') }}</td>
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
                            <td>{{ $insurerService->unit->description ?? 'N/A' }}</td>
                            <td>{{ fdate($insurerService->date_return, 'l, j F Y h:i a') }}</td>
                            <td>{{ $insurerService->driver->name }}</td>
                            <td>{{ $insurerService->helperr->name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <th><small>TERMINO</small></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td>{{ fdate($insurerService->date_end, 'l, j F Y h:i a') }}</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <th>
                                <a href="{{ route('service.insurer.edit', $insurerService) }}" class="btn btn-danger btn-sm"><i class="fa fa-edit" aria-hidden="true"></i>&nbsp;EDITAR</a>
                            </th>
                            <th></th>
                            <th><big>TOTAL</big></th>
                            <th><big>$ {{ number_format($insurerService->total, 2) }}</big></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><big>{{ $insurerService->bill ? 'Fac. ' . $insurerService->bill : '' }}</big></th>
                        </tr>
                    </tbody>
                </table>
            </solid-box>
        </div>
    </div>
@endsection
