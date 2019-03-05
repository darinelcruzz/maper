@extends('admin')

@section('htmlheader_title')
    Editar Aseg
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <solid-box title="Nuevo servicio aseguradoras" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'service.insurer.update']) !!}

                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            {!! Field::text('description', isset($insurerService) ? $insurerService->description: null, ['tpl' => 'templates/twolines']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            {!! Field::select('insurer_id', $insurers, isset($insurerService) ? $insurerService->insurer_id: null,
                                ['empty' => 'Seleccione aseguradora', 'label' => 'Aseguradora', 'tpl' => 'templates/twolines'])
                            !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            {!! Field::datetimelocal('date_assignment', isset($insurerService) ? fdate($insurerService->date_assignment, 'Y-m-d\TH:i') : null, ['tpl' => 'templates/twolines'])
                            !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="row">
                                <div class="col-md-4">
                                    {!! Field::text('brand', isset($insurerService) ? $insurerService->brand: null, ['tpl' => 'templates/twolines'])!!}
                                </div>
                                <div class="col-md-4">
                                    {!! Field::text('type', isset($insurerService) ? $insurerService->type: null, ['tpl' => 'templates/twolines'])!!}
                                </div>
                                <div class="col-md-4">
                                    {!! Field::select('category', ['Moto' => 'Moto', 'Coche' => 'Coche', 'Tractocamión' => 'Tractocamión', 'Maquinaria' => 'Maquinaria'],
                                        isset($insurerService) ? $insurerService->category: null, ['empty' => 'Seleccione la categoría', 'tpl' => 'templates/twolines']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    {!! Field::text('plate', isset($insurerService) ? $insurerService->plate: null, ['tpl' => 'templates/twolines'])!!}
                                </div>
                                <div class="col-md-4">
                                    {!! Field::number('model', isset($insurerService) ? $insurerService->model: null, ['tpl' => 'templates/twolines'])!!}
                                </div>
                                <div class="col-md-4">
                                    {!! Field::text('color', isset($insurerService) ? $insurerService->color: null, ['tpl' => 'templates/twolines'])!!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    {!! Field::text('load', isset($insurerService) ? $insurerService->load: null, ['tpl' => 'templates/twolines'])!!}
                                </div>
                                <div class="col-md-4">
                                    {!! Field::number('inventory', isset($insurerService) ? $insurerService->inventory: null, ['tpl' => 'templates/twolines', 'step' => '0.01'])!!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('origin', isset($insurerService) ? $insurerService->origin: null, ['tpl' => 'templates/twolines']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::text('destination', isset($insurerService) ? $insurerService->destination: null, ['tpl' => 'templates/twolines']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('user', isset($insurerService) ? $insurerService->user: null, ['tpl' => 'templates/twolines']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::number('amount', isset($insurerService) ? $insurerService->amount: null, ['step' => '0.01', 'min' => '0', 'label' => 'Importe estimado', 'tpl' => 'templates/twolines']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::number('maneuver', isset($insurerService) ? $insurerService->maneuver: null, ['min' => '0', 'tpl' => 'templates/twolines', 'step' => '0.01']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::number('pension', isset($insurerService) ? $insurerService->pension: null, ['min' => '0', 'tpl' => 'templates/twolines', 'step' => '0.01']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::datetimelocal('date_contact', isset($insurerService) ? fdate($insurerService->date_contact, 'Y-m-d\TH:i') : null, ['tpl' => 'templates/twolines']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::datetimelocal('date_end', isset($insurerService) ? fdate($insurerService->date_end, 'Y-m-d\TH:i') : null, ['tpl' => 'templates/twolines']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                  {!! Field::text('booth', isset($insurerService) ? $insurerService->booth: null, ['tpl' => 'templates/twolines']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::text('folio', isset($insurerService) ? $insurerService->folio: null, ['tpl' => 'templates/twolines']) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::text('file', isset($insurerService) ? $insurerService->file: null, ['label' => 'Asistencia', 'tpl' => 'templates/twolines']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::text('sinister', isset($insurerService) ? $insurerService->sinister: null, ['tpl' => 'templates/twolines']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Field::select('driver_id', $drivers, isset($insurerService) ? $insurerService->driver_id : null, ['empty' => 'Seleccione un operador', 'tpl' => 'templates/twolines']) !!}
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {!! Field::select('helper', $drivers, isset($insurerService) ? $insurerService->helper : null, ['empty' => 'Seleccione un apoyo', 'tpl' => 'templates/twolines']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::select('unit_id', $units, isset($insurerService) ? $insurerService->unit_id : null, ['empty' => 'Seleccione unidad', 'tpl' => 'templates/twolines']) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::datetimelocal('date_return', isset($insurerService) ? fdate($insurerService->date_return, 'Y-m-d\TH:i') : null, ['tpl' => 'templates/twolines']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="id" value="{{ $insurerService->id }}">
                    @if (auth()->user()->level == 1 || $service->status != 'pagado')
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-black btn-block']) !!}
                    @endif

                {!! Form::close() !!}
            </solid-box>

        </div>
    </div>

    @include('templates.clientmodal')

@endsection
