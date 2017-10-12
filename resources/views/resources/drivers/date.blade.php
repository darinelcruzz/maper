@extends('admin')

@section('main-content')
<div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Imprimir formato</h3>
            </div>
            <!-- form start -->
            {!! Form::open(['method' => 'POST', 'route' => 'resources.driver.format']) !!}

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
            <!-- /.box-body -->
            <div class="box-footer">
                {!! Form::submit('Buscar', ['class' => 'btn btn-black btn-block']) !!}
            </div>
            <!-- /.box-footer -->
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-12 col-lg-9">
        <data-table-com title="Servicios con Extras" example="example1" color="box-default">
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
                @foreach ($outTime as $row)
                    <tr>
                        <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                        <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                        <td>{{ $row->origin }} <br> {{ $row->destination }}</td>
                        <td>{{ $row->getShortDate('date_service') }} <br> {{ $row->getShortDate('date_return') }}</td>
                        <td>
                            {{ $row->driverr->name }} <br>
                            @if ($row->extra_driver != null)
                                $ {{ $row->extra_driver }}
                            @else
                                @include('resources/drivers/extraDriver')
                            @endif
                        </td>
                        <td>
                            @if ($row->helper != null)
                                {{ $row->helperr->name }} <br>
                                @if ($row->extra_helper != null)
                                    $ {{ $row->extra_helper }}
                                @else
                                    @include('resources/drivers/extraHelper')
                                @endif
                            @else
                                n/a
                            @endif

                        </td>
                    </tr>
                @endforeach
            </template>
        </data-table-com>
    </div>
</div>
@endsection
