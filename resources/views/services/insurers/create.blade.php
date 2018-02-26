@extends('admin')

@section('main-content')

    <div class="row">
            <div class="col-md-8">
                <solid-box title="Agregar un servicio" color="box-danger">
                    {!! Form::open(['method' => 'POST', 'route' => 'service.insurer.store']) !!}

                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('insurer_id', $insurers, null,
                                    ['tpl' => 'templates/withicon', 'empty' => 'Seleccione aseguradora', 'label' => 'Aseguradora'],
                                    ['icon' => 'medkit'])
                                !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('date', Date::now(), ['tpl' => 'templates/withicon'], ['icon' => 'calendar']) !!}
                            </div>
                        </div>

                        {!! Field::select('driver_id', $drivers, null,
                            ['tpl' => 'templates/withicon', 'empty' => 'Seleccione operador', 'label' => 'Conductor'],
                            ['icon' => 'bus'])
                        !!}
                        {!! Field::text('vehicule', ['tpl' => 'templates/withicon'], ['icon' => 'car']) !!}

                        <div class="row">
                            <div class="col-md-3">
                                {!! Field::text('plate', ['tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Field::text('model', ['tpl' => 'templates/withicon'], ['icon' => 'trademark']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Field::text('type', ['tpl' => 'templates/withicon'], ['icon' => 'bookmark']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Field::text('color', ['tpl' => 'templates/withicon'], ['icon' => 'paint-brush']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('location', ['tpl' => 'templates/withicon'], ['icon' => 'globe']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('destination', ['tpl' => 'templates/withicon'], ['icon' => 'map-marker']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('client', ['tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::number('amount', 0, ['tpl' => 'templates/withicon', 'step' => '0.01'], ['icon' => 'usd']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::text('contact', ['tpl' => 'templates/withicon'], ['icon' => 'calendar-o']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('end', ['tpl' => 'templates/withicon', 'label' => 'Término'], ['icon' => 'calendar-times-o']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('assignment', ['tpl' => 'templates/withicon', 'label' => 'Asignación'], ['icon' => 'clock-o']) !!}
                            </div>
                        </div>

                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger pull-right']) !!}

                    {!! Form::close() !!}
                </solid-box>
            </div>
        </div>

@endsection
