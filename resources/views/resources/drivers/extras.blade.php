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
            </template>
        </data-table-com>
    </div>
</div>
@endsection
