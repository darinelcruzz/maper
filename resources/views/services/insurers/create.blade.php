@extends('admin')

@section('htmlheader_title')
    Aseguradoras
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <solid-box title="Nuevo servicio aseguradoras" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'service.insurer.store']) !!}

                    <form-wizard
                        title=""
                        subtitle=""
                        color="#dd4b39"
                        @on-complete="enableButton"
                        @on-change="disableButton"
                        back-button-text="Anterior"
                        next-button-text="Siguiente"
                        finish-button-text="Completado">

                        <tab-content title="Cliente" icon="fa fa-user">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    {!! Field::text('description', ['tpl' => 'templates/twolines']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    {!! Field::select('insurer_id', $insurers, null,
                                        ['empty' => 'Seleccione aseguradora', 'label' => 'Aseguradora', 'tpl' => 'templates/twolines'])
                                    !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    {!! Field::datetimelocal('date_assignment', ['tpl' => 'templates/twolines'])
                                    !!}
                                </div>
                            </div>
                        </tab-content>

                        <tab-content title="Vehículo" icon="fa fa-car">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="row">
                                        <div class="col-md-4">
                                            {!! Field::text('brand', ['tpl' => 'templates/twolines'])!!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! Field::text('type', ['tpl' => 'templates/twolines'])!!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! Field::select('category', ['Moto' => 'Moto', 'Coche' => 'Coche', 'Tractocamión' => 'Tractocamión', 'Maquinaria' => 'Maquinaria', 'Camión' => 'Camión', 'Autobus' => 'Autobus'],
                                             ['empty' => 'Seleccione la categoría', 'tpl' => 'templates/twolines']) !!}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            {!! Field::text('plate', ['tpl' => 'templates/twolines'])!!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! Field::number('model', ['tpl' => 'templates/twolines'])!!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! Field::text('color', ['tpl' => 'templates/twolines'])!!}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            {!! Field::text('load', ['tpl' => 'templates/twolines'])!!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! Field::number('inventory', ['tpl' => 'templates/twolines'])!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tab-content>

                        <tab-content title="Ubicación" icon="fa fa-map-marker">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">

                                    <div class="row">
                                        <div class="col-md-4">
                                            {!! Field::text('origin', ['tpl' => 'templates/twolines']) !!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! Field::text('destination', ['tpl' => 'templates/twolines']) !!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! Field::number('km', 0, ['min' => '0', 'tpl' => 'templates/twolines']) !!}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            {!! Field::text('user', ['tpl' => 'templates/twolines']) !!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! Field::number('amount', 0, ['step' => '0.01', 'min' => '0', 'label' => 'Importe estimado', 'tpl' => 'templates/twolines']) !!}
                                        </div>
                                        <div class="col-md-4">
                                            <label>&nbsp;</label><br>
                                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default">
                                                Tabulador
                                            </button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            {!! Field::number('maneuver', 0, ['min' => '0', 'tpl' => 'templates/twolines', 'step' => '0.01']) !!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! Field::number('pension', 0, ['min' => '0', 'tpl' => 'templates/twolines', 'step' => '0.01']) !!}
                                        </div>
                                        <div class="col-md-4">
                                            <label>&nbsp;</label><br>
                                            <a href="https://google.com.mx/maps" target="_blank" class="btn btn-success btn-block">
                                                Maps &nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </tab-content>

                        <tab-content title="Aseguradora" icon="fa fa-briefcase">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Field::datetimelocal('date_contact', ['tpl' => 'templates/twolines']) !!}
                                        </div>
                                        <div class="col-md-6">
                                            {!! Field::datetimelocal('date_end', ['tpl' => 'templates/twolines']) !!}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                          {!! Field::text('booth', ['tpl' => 'templates/twolines']) !!}
                                        </div>
                                        <div class="col-md-6">
                                            {!! Field::text('folio', ['tpl' => 'templates/twolines']) !!}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Field::text('file', ['label' => 'Asistencia', 'tpl' => 'templates/twolines']) !!}
                                        </div>
                                        <div class="col-md-6">
                                            {!! Field::text('sinister', ['tpl' => 'templates/twolines']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tab-content>

                        <tab-content title="Verificación" icon="fa fa-truck">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! Field::select('driver_id', $drivers, null, ['empty' => 'Seleccione operador', 'tpl' => 'templates/twolines']) !!}
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! Field::select('helper', $drivers, null, ['empty' => 'Seleccione operador', 'tpl' => 'templates/twolines']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            {!! Field::select('unit_id', $units, null, ['empty' => 'Seleccione unidad', 'tpl' => 'templates/twolines']) !!}
                                        </div>
                                        <div class="col-md-6">
                                            {!! Field::datetimelocal('date_return', ['tpl' => 'templates/twolines']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tab-content>
                    </form-wizard>

                    <hr>

                    <div v-if="isFormWizardDone" class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fa fa-save"></i> &nbsp; G U A R D A R
                            </button>
                        </div>
                    </div>

                {!! Form::close() !!}
            </solid-box>

        </div>
    </div>

    @include('templates.clientmodal')

@endsection
