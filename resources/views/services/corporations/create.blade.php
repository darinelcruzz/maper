@extends('admin')

@section('htmlheader_title')
    Corporaciones
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-6">
            <solid-box title="Nuevo servicio de corporaciones" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'service.corporation.store']) !!}

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
                            @include('templates.principal')
                        </tab-content>
                        <tab-content title="Vehículo" icon="fa fa-car">
                            @include('templates.car')
                        </tab-content>
                        <tab-content title="Ubicación" icon="fa fa-map-marker">
                            @include('templates.ubication')
                        </tab-content>
                        <tab-content title="Verificación" icon="fa fa-truck">
                            @include('templates.unit')
                        </tab-content>
                    </form-wizard>

                    <hr>

                    <input type="hidden" name="status" value="corralon">
                    <input type="hidden" name="view" value="create">
                    <input type="hidden" name="pay" value="Credito">
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
