@extends('admin')

@section('main-content')
<div class="row">
    <div class="col-md-12">
        <data-table-com title="Servicios con Extras" example="example1" color="danger">
            <template slot="header">
                <tr>
                    <th>#</th>
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
                        <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                        <td>{{ $row->service }}</td>
                        <td>{{ $row->brand }} <br> {{ $row->type }} <br> {{ $row->color }}</td>
                        <td><b>Origen:</b>{{ $row->origin }} <br><b>Destino:</b> {{ $row->destination }}</td>
                        <td><b>Serv:</b>{{ fdate($row->date_service, ' l, j/F/Y H:s') }} <br><b>Reg:</b> {{ fdate($row->date_return, ' l, j/F/Y H:s') }}</td>
                        <td>
                            {{ $row->driver->name }} <br>
                            {{ fnumber($row->extra_driver) }}
                        </td>
                        <td>
                            {{ $row->helperr->name or '' }} <br>
                            {{ $row->extra_helper ?  fnumber($row->extra_helper, 2): '' }}
                        </td>
                    </tr>
                @endforeach
                @foreach ($insurerServices as $row)
                    <tr>
                        {{-- a href="{{ route('insurerServices.details', ['id' => $row->id]) }}"> --}}
                        <td>{{ $row->id }}</td>
                        <td>Aseguradora</td>
                        <td>{{ $row->brand }} <br> {{ $row->type }} <br> {{ $row->color }}</td>
                        <td><b>Origen:</b>{{ $row->origin }} <br><b>Destino:</b> {{ $row->destination }}</td>
                        <td><b>Serv:</b>{{ fdate($row->date_service, ' l, j/F/Y H:s') }} <br><b>Reg:</b> {{ fdate($row->date_return, ' l, j/F/Y H:s') }}</td>
                        <td>
                            {{ $row->driver->name }} <br>
                            {{ fnumber($row->extra_driver) }}
                        </td>
                        <td>
                            {{ $row->helperr->name or '' }} <br>
                            {{ $row->extra_helper ?  fnumber($row->extra_helper, 2): '' }}
                        </td>
                    </tr>
                @endforeach
                @foreach ($extras as $row)
                    <tr>
                        @if ($row->service_id > 0)
                            <td>{{ $row->id }}</td>
                            <td>Extra servicio</td>
                            <td>{{ $row->service->brand }} <br> {{ $row->service->type }} <br> {{ $row->service->color }}</td>
                            <td><b>Origen:</b>{{ $row->service->origin }} <br><b>Destino:</b> {{ $row->service->destination }}</td>
                            <td><b>Serv:</b>{{ fdate($row->service->date_service, ' l, j/F/Y H:s') }} <br><b>Reg:</b> {{ fdate($row->service->date_return, ' l, j/F/Y H:s') }}</td>
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
                        @endif
                        @if ($row->insurer_service_id > 0)
                            <td>{{ $row->id }}</td>
                            <td>Extra Aseguradora</td>
                            <td>{{ $row->insurerService->brand }} <br> {{ $row->insurerService->type }} <br> {{ $row->insurerService->color }}</td>
                            <td><b>Origen:</b>{{ $row->insurerService->origin }} <br><b>Destino:</b> {{ $row->insurerService->destination }}</td>
                            <td><b>Serv:</b>{{ fdate($row->insurerService->date_insurerService, ' l, j/F/Y H:s') }} <br><b>Reg:</b> {{ fdate($row->insurerService->date_return, ' l, j/F/Y H:s') }}</td>
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
                        @endif
                    </tr>
                @endforeach
            </template>
        </data-table-com>
    </div>
    <h3>Total = $ {{ $services->sum('extra_driver') + $services->sum('extra_helper') + $insurerServices->sum('extra_driver') + $insurerServices->sum('extra_helper') + $extras->sum('extra')  }}
</div></h3>
@endsection
