@extends('admin')

@section('main-content')
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Imprimir formato</h3>
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'resources.driver.format', 'target' => '_blank']) !!}
            <div class="box-body">

                <div class="row">
                    <div class="col-md-12">
                        {!! Field::date('start', $date, ['tpl' => 'templates/withicon', 'label' => 'Inicio'],
                        ['icon' => 'calendar-check-o']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Field::date('end', $date, ['tpl' => 'templates/withicon', 'label' => 'Fin'],
                        ['icon' => 'calendar-check-o']) !!}
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {!! Form::submit('Buscar', ['class' => 'btn btn-black btn-block']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="col-md-12 col-lg-9">
        <data-table-com title="Servicios con Extras" example="example1" color="danger">
            <template slot="header">
                <tr>
                    <th>#</th>
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
                        <td>{{ $row->brand }} <br> {{ $row->type }} <br> {{ $row->color }}</td>
                        <td><b>Origen:</b>{{ $row->origin }} <br><b>Destino:</b> {{ $row->destination }}</td>
                        <td><b>Serv:</b>{{ fdate($row->date_service, ' l, j/F/Y H:s') }} <br><b>Reg:</b> {{ fdate($row->date_return, ' l, j/F/Y H:s') }}</td>
                        <td>
                            {{ $row->driver->name }} <br>
                            {{ $row->extra_driver ?  '$ ' . number_format($row->extra_driver, 2): '' }}
                        </td>
                        <td>
                            {{ $row->helperr->name or '' }} <br>
                            {{ $row->extra_helper ?  '$ ' . number_format($row->extra_helper, 2): '' }}
                        </td>
                    </tr>
                @endforeach
            </template>
        </data-table-com>
    </div>
</div>
@endsection
