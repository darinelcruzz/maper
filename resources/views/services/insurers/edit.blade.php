@extends('admin')

@section('main-content')

    <div class="row">
            <div class="col-md-10">
                <solid-box title="Editar servicio" color="box-danger">
                    {!! Form::open(['method' => 'POST', 'route' => 'service.insurer.update']) !!}

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
                                {!! Field::text('origin', $insurerService->origin, ['tpl' => 'templates/withicon'], ['icon' => 'globe']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('destination', $insurerService->destination, ['tpl' => 'templates/withicon'], ['icon' => 'map-marker']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::number('amount', $insurerService->amount, ['step' => '0.01', 'min' => '0', 'label' => 'Importe estimado']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::number('maneuver', $insurerService->maneuver, ['min' => '0']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::number('pension', $insurerService->pension, ['min' => '0']) !!}
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{ $insurerService->id }}">
                        {!! Form::submit('Guardar cambios', ['class' => 'btn btn-danger pull-right']) !!}

                    {!! Form::close() !!}
                </solid-box>
            </div>
        </div>

@endsection
