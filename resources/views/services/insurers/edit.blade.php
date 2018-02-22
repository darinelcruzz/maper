@extends('admin')

@section('main-content')

    <div class="row">
            <div class="col-md-8">
                <solid-box title="Editar servicio" color="box-danger">
                    {!! Form::open(['method' => 'POST', 'route' => 'service.insurer.update']) !!}

                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('insurer_id', $insurers, $insurerService->insurer_id,
                                    ['tpl' => 'templates/withicon', 'empty' => 'Seleccione aseguradora'],
                                    ['icon' => 'medkit'])
                                !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('date', $insurerService->date, ['tpl' => 'templates/withicon'], ['icon' => 'calendar']) !!}
                            </div>
                        </div>

                        {!! Field::select('driver_id', $drivers, $insurerService->driver_id,
                            ['tpl' => 'templates/withicon', 'empty' => 'Seleccione operador'],
                            ['icon' => 'bus'])
                        !!}
                        {!! Field::text('vehicule', $insurerService->vehicule, ['tpl' => 'templates/withicon'], ['icon' => 'car']) !!}

                        <div class="row">
                            <div class="col-md-3">
                                {!! Field::text('plate', $insurerService->plate, ['tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Field::text('model', $insurerService->model, ['tpl' => 'templates/withicon'], ['icon' => 'trademark']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Field::text('type', $insurerService->type, ['tpl' => 'templates/withicon'], ['icon' => 'bookmark']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Field::text('color', $insurerService->color, ['tpl' => 'templates/withicon'], ['icon' => 'paint-brush']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('location', $insurerService->location, ['tpl' => 'templates/withicon'], ['icon' => 'globe']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('destination', $insurerService->destiny, ['tpl' => 'templates/withicon'], ['icon' => 'map-marker']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('client', $insurerService->client, ['tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::number('amount', $insurerService->amount, ['tpl' => 'templates/withicon', 'step' => '0.1'], ['icon' => 'usd']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::text('contact', $insurerService->contact, ['tpl' => 'templates/withicon'], ['icon' => 'calendar-o']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('end', $insurerService->end, ['tpl' => 'templates/withicon'], ['icon' => 'calendar-times-o']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('assignment', $insurerService->assignment, ['tpl' => 'templates/withicon'], ['icon' => 'clock-o']) !!}
                            </div>
                        </div>

                        {!! Form::submit('Guardar cambios', ['class' => 'btn btn-danger pull-right']) !!}

                    {!! Form::close() !!}
                </solid-box>
            </div>
        </div>

@endsection
