@extends('admin')

@section('htmlheader_title', 'Crear servicio general')

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <solid-box title="Nuevo servicio general" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'service.general.store']) !!}

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

                    <input type="hidden" name="status" value="pendiente">
                    <input type="hidden" name="service" value="General">
                    <input type="hidden" name="view" value="create">
                    <div v-if="isFormWizardDone" class="row">
                        <div class="col-md-6">
                            {!! Form::submit('Pagado/Abonos', ['class' => 'btn btn-success btn-block', 'name' => 'pagado']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::submit('Crédito', ['class' => 'btn btn-danger btn-block', 'name' => 'credito']) !!}
                        </div>
                    </div>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>
    @include('templates.clientmodal')
@endsection
