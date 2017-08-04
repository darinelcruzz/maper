@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo servicio Corporaciones</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'service.public.store']) !!}

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::select('service',
                                ['Tránsito del Estado' => 'Tránsito del Estado', 'Vialidad Municipal' => 'Vialidad Municipal', 'Policia Municipal' => 'Policia Municipal',
                                'Fiscalía' => 'Fiscalía', 'Federal' => 'Federal'], null, ['empty' => '¿A que corresponde?'])
                            !!}
                       </div>
                        <div class="col-md-4">
                            {!! Field::text('description')!!}
                        </div>
                        <div class="col-md-4">
                            <div id="field_date" class="form-group">
                                <label for="date_service" class="control-label">
                                    Fecha y hora:
                                </label>
                                <div class="controls">
                                    <input class="form-control" id="date_service" name="date_service" type="datetime-local" value="{{ date('Y-m-d\TH:i') }}">
                                </div>
                            </div>
                       </div>
                    </div>

                    @include('templates.car')
                    @include('templates.ubication')

                    <div class="box-header with-border">
                        <h3 class="box-title">Unidad
                            <i class="fa fa-truck" aria-hidden="true"></i>
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::select('driver',
                                ['Juan Clemente' => 'Juan Clemente', 'Juan Manuel' => 'Juan Manuel', 'Francisco' => 'Francisco',
                                'Rafael' => 'Rafael', 'Deberín' => 'Deberín'], isset($service) ? $service->driver: null, ['empty' => 'Seleccione al operador'])
                            !!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::select('unit', $units, isset($service) ? $service->unit: null, ['empty' => 'Seleccione la unidad']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::select('lot',
                                ['cueva' => 'Cueva'], isset($service) ? $service->lot: null, ['empty' => 'Seleccione el corralón'])
                            !!}
                        </div>
                    </div>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="status" value="corralon">
                    {!! Form::submit('Siguiente', ['class' => 'btn btn-black btn-block']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
