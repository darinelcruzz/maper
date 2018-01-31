@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <solid-box title="Servicios de aseguradoras" color="box-danger">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Aseguradora</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Operario</th>
                                <th>Vehículo</th>
                                <th>Ubicación</th>
                                <th>Destino</th>
                                <th>Costo</th>
                                <th><i class="fa fa-clock-o"></i></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>
                                        {{ $service->id }}
                                        <a href="{{ route('service.insurer.edit', ['insurerService' => $service->id])}}">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td>{{ $service->insurer->name }}</td>
                                    <td>{{ $service->date }}</td>
                                    <td>{{ $service->client }}</td>
                                    <td>{{ $service->driver->name }}</td>
                                    <td>{{ $service->vehicule }}</td>
                                    <td>{{ $service->location }}</td>
                                    <td>{{ $service->destiny }}</td>
                                    <td>{{ $service->amount }}</td>
                                    <td>{{ $service->contact }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </solid-box>
        </div>
    </div>

@endsection
