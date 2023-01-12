{{-- @extends('admin')

@section('main-content')
<div class="row">
    <div class="col-md-12"> --}}
        <data-table title="Servicios con Extras" example="example1" color="danger">
            <template slot="header">
                <tr>
                    <th>#</th>
                    <th><i class="fa fa-cogs"></i></th>
                    <th>Tipo</th>
                    <th>Vehiculo</th>
                    <th>Ruta</th>
                    <th>Fechas</th>
                    <th>Operador</th>
                    <th>Apoyo</th>
                </tr>
            </template>
            <template slot="body">
                @foreach ($services as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>
                            <dropdown color="success" icon="cogs">
                                <ddi to="{{ route('service.editHour', $row)}}"
                                    icon="clock-o" text="Hora de regreso/Extras">
                                </ddi>
                                @if ($row->service == 'General')
                                    <ddi to="{{ route('service.general.details', $row) }}"
                                        icon="eye" text="Detalles">
                                    </ddi>
                                @else
                                    <ddi to="{{ route('service.corporation.details', $row) }}"
                                        icon="eye" text="Detalles">
                                    </ddi>
                                @endif
                            </dropdown>
                        </td>
                        <td>{{ $row->service }}</td>
                        <td>{{ $row->brand }} <br> {{ $row->type }} <br> {{ $row->color }}</td>
                        <td><b>Origen:</b>{{ $row->origin }} <br><b>Destino:</b> {{ $row->destination }}</td>
                        <td><b>Serv:</b>{{ fdate($row->date_service, ' l, j/F/Y H:i') }} <br><b>Reg:</b> {{ fdate($row->date_return, ' l, j/F/Y H:i') }}</td>
                        <td>
                            {{ $row->driver->name }} <br>
                            {{ fnumber($row->extra_driver) }}
                        </td>
                        <td>
                            {{ $row->helperr->name ?? '' }} <br>
                            {{ $row->extra_helper ?  fnumber($row->extra_helper, 2): '' }}
                        </td>
                    </tr>
                @endforeach
                @foreach ($insurerServices as $row)
                    <tr>
                        {{-- a href="{{ route('insurerServices.details', ['id' => $row->id]) }}"> --}}
                        <td>{{ $row->id }}</td>
                        <td></td>
                        <td>Aseguradora</td>
                        <td>{{ $row->brand }} <br> {{ $row->type }} <br> {{ $row->color }}</td>
                        <td><b>Origen:</b>{{ $row->origin }} <br><b>Destino:</b> {{ $row->destination }}</td>
                        <td><b>Serv:</b>{{ fdate($row->date_assignment, ' l, j/F/Y H:i') }} <br><b>Reg:</b> {{ fdate($row->date_return, ' l, j/F/Y H:i') }}</td>
                        <td>
                            {{ $row->driver->name }} <br>
                            {{ fnumber($row->extra_driver) }}
                        </td>
                        <td>
                            {{ $row->helperr->name ?? '' }} <br>
                            {{ $row->extra_helper ?  fnumber($row->extra_helper, 2): '' }}
                        </td>
                    </tr>
                @endforeach
                @foreach ($extras as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        @if ($row->service_id > 0)
                            <td></td>
                            <td>Extra servicio</td>
                            <td>{{ $row->service->brand }} <br> {{ $row->service->type }} <br> {{ $row->service->color }}</td>
                            <td><b>Origen:</b>{{ $row->service->origin }} <br><b>Destino:</b> {{ $row->service->destination }}</td>
                            <td><b>Serv:</b>{{ fdate($row->service->date_service, ' l, j/F/Y H:i') }} <br><b>Reg:</b> {{ fdate($row->service->date_return, ' l, j/F/Y H:i') }}</td>
                        @endif
                        @if ($row->insurer_service_id > 0)
                            <td></td>
                            <td>Extra Aseguradora</td>
                            <td>{{ $row->insurerService->brand }} <br> {{ $row->insurerService->type }} <br> {{ $row->insurerService->color }}</td>
                            <td><b>Origen:</b>{{ $row->insurerService->origin }} <br><b>Destino:</b> {{ $row->insurerService->destination }}</td>
                            <td><b>Serv:</b>{{ fdate($row->insurerService->date_assignment, ' l, j/F/Y H:i') }} <br><b>Reg:</b> {{ fdate($row->insurerService->date_return, ' l, j/F/Y H:i') }}</td>
                        @endif
                        <td>
                            @if ($row->type == 1)
                                {{ $row->driver->name }} <br>
                                {{ fnumber($row->extra) }}
                            @endif
                        </td>
                        <td>
                            @if ($row->type == 0)
                                {{ $row->driver->name }} <br>
                                {{ fnumber($row->extra) }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </template>
        </data-table>
    {{-- </div> --}}
    <h3 align="center">Total = {{ fnumber($services->sum('extra_driver') + $services->sum('extra_helper') + $insurerServices->sum('extra_driver') + $insurerServices->sum('extra_helper') + $extras->sum('extra')) }}</h3>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <a href="{{ route('resources.driver.format') }}" class="btn btn-block btn-primary" target="_blank">
                Imprimir
            </a>
        </div>
    </div>
{{-- </div> --}}
{{-- @endsection --}}
