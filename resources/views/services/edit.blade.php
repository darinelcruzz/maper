@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar servicio</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'service.change']) !!}

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::select('service',
                                    ['Publico en general' => 'Publico en general'], [$service->service], ['empty' => false])
                                !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('description', $service->description)!!}
                            </div>
                            <div class="col-md-4">
                                <div id="field_date" class="form-group">
                                    <label for="date" class="control-label">
                                        Fecha y hora:
                                    </label>
                                    <div class="controls">
                                        <input class="form-control" id="date" name="date" type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime($service->date_service)) }}">
                                    </div>
                                </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-4">
                               {!! Field::number('amount', $service->amount,['min' => '0', 'step' => '.01'])!!}
                          </div>
                      </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">Vehículo
                                <i class="fa fa-car" aria-hidden="true"></i>
                            </h3>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::text('brand', $service->brand)!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('model', $service->model)!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::select('type',
                                    ['moto' => 'Moto', 'coche' => 'Coche', '3.5 a 4.5 Ton' => '3.5 a 4.5 Ton', '5 a 9 Ton' => '5 a 9 Ton', 'Mas de 10 Ton' => 'Mas de 10 Ton'], $service->type,
                                    ['empty' => 'Seleccione el tipo'])
                                !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::number('load', $service->load, ['min' => '0'])!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('plate', $service->plate)!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('color', $service->color)!!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::number('inventory', $service->inventory, ['min' => '0'])!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::select('key', ['si' => 'Si', 'no' => 'No'], $service->key,['empty' => '¿Tenía llave?']) !!}
                            </div>
                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">Ubicación
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </h3>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::text('username', $service->username)!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('origin', $service->origin)!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('destination', $service->destination)!!}
                            </div>
                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">Unidad
                                <i class="fa fa-truck" aria-hidden="true"></i>
                            </h3>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::select('driver',
                                    ['Juan Clemente' => 'Juan Clemente', 'Juan Manuel' => 'Juan Manuel', 'Francisco' => 'Francisco',
                                    'Rafael' => 'Rafael', 'Deberín' => 'Deberín'], $service->driver,['empty' => 'Seleccione al operador'])
                                !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::select('unit', $units, $service->unit, ['empty' => 'Seleccione la unidad']) !!}
                            </div>
                        </div>

                    </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    {!! Form::submit('Siguiente', ['class' => 'btn btn-black btn-block']) !!}
                  </div>
                  <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
