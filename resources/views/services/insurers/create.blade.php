@extends('admin')

@section('htmlheader_title')
    Aseguradoras
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <simple-box title="Nuevo servicio Aseguradoras" color="box-black">
                {!! Form::open(['method' => 'POST', 'route' => 'service.insurer.store']) !!}
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::text('description', isset($service) ? $service->description: null) !!}
                        </div>
                        <div class="col-md-4">
                            <div id="field_date" class="form-group">
                                <label for="date_service" class="control-label">
                                    Fecha y hora de servicio
                                </label>
                                <div class="controls">
                                    <input class="form-control" id="date_service" name="date_service" type="datetime-local" value="{{  isset($service) ? date('Y-m-d\TH:i', strtotime($service->date_service)) : date('Y-m-d\TH:i') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {!! Field::select('insurer_id', $insurers, null,
                                ['empty' => 'Seleccione aseguradora', 'label' => 'Aseguradora'])
                            !!}
                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Vehículo
                            <i class="fa fa-car" aria-hidden="true"></i>
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::text('brand', isset($service) ? $service->brand: null)!!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::text('type', isset($service) ? $service->type: null)!!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::select('category', ['Moto' => 'Moto', 'Coche' => 'Coche', 'Tractocamión' => 'Trantocamión'],
                                isset($service) ? $service->category: null, ['empty' => 'Seleccione la categoría']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::text('plate', isset($service) ? $service->plate: null)!!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::number('model', isset($service) ? $service->model: null)!!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::text('color', isset($service) ? $service->color: null)!!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::text('load', isset($service) ? $service->load: null)!!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::number('inventory', isset($service) ? $service->inventory: null)!!}
                        </div>

                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Ubicación
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::text('origin', isset($service) ? $service->origin: null) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::text('destination', isset($service) ? $service->destination: null) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::number('amount', 0, ['step' => '0.01', 'min' => '0', 'label' => 'Importe estimado']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::number('maneuver', 0, ['min' => '0']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::number('pension', 0, ['min' => '0']) !!}
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <br><a href="https://google.com.mx/maps" target="_blank" class="btn btn-success btn-block">Google Maps
                                <i class="fa fa-map-pin" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <br>
                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default">
                                Tabulador
                            </button>
                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Unidad
                            <i class="fa fa-truck" aria-hidden="true"></i>
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::select('driver_id', $drivers, null, ['empty' => 'Seleccione operador']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::select('unit_id', $units, null, ['empty' => 'Seleccione operador']) !!}
                        </div>
                        <div class="col-md-4">
                            <div id="field_date" class="form-group">
                                <label for="date_return" class="control-label">
                                    Fecha y hora regreso:
                                </label>
                                <div class="controls">
                                    <input class="form-control" id="date_return" name="date_return" type="datetime-local" value="{{  isset($service) ? date('Y-m-d\TH:i', strtotime($service->date_service)) : date('Y-m-d\TH:i') }}">
                                </div>
                            </div>
                       </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::select('helper', $drivers, null, ['empty' => 'Seleccione operador']) !!}
                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Extras
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </h3>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::text('client', isset($service) ? $service->client: null) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div id="field_date" class="form-group">
                                <label for="date_contact" class="control-label">
                                    Fecha y hora contacto
                                </label>
                                <div class="controls">
                                    <input class="form-control" id="date_contact" name="date_contact" type="datetime-local" value="{{  isset($service) ? date('Y-m-d\TH:i', strtotime($service->date_contact)) : date('Y-m-d\TH:i') }}">
                                </div>
                            </div>
                       </div>
                       <div class="col-md-4">
                           <div id="field_date" class="form-group">
                               <label for="date_assignment" class="control-label">
                                   Fecha y hora asignación
                               </label>
                               <div class="controls">
                                   <input class="form-control" id="date_assignment" name="date_assignment" type="datetime-local" value="{{  isset($service) ? date('Y-m-d\TH:i', strtotime($service->date_assignment)) : date('Y-m-d\TH:i') }}">
                               </div>
                           </div>
                      </div>
                       <div class="col-md-4">
                           <div id="field_date" class="form-group">
                               <label for="date_end" class="control-label">
                                   Fecha y hora término
                               </label>
                               <div class="controls">
                                   <input class="form-control" id="date_end" name="date_end" type="datetime-local" value="{{  isset($service) ? date('Y-m-d\TH:i', strtotime($service->date_end)) : date('Y-m-d\TH:i') }}">
                               </div>
                           </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::text('folio', isset($service) ? $service->folio: null) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::text('file', isset($service) ? $service->file: null) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::text('sinister', isset($service) ? $service->sinister: null) !!}
                        </div>
                    </div>

                    <div class="box-footer">
                        <input type="hidden" name="status" value="credito">
                        <input type="hidden" name="pay" value="credito">
                        {!! Form::submit('Siguiente', ['class' => 'btn btn-black btn-block']) !!}
                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>

@endsection
