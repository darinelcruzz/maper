@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo servicio</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'service.store']) !!}

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::select('service',
                                    ['Publico en general' => 'Publico en general'], null)
                                !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('description')!!}
                            </div>
                            <div class="col-md-3">
                                <div id="field_date" class="form-group">
                                    <label for="date" class="control-label">
                                        Fecha
                                    </label>
                                    <div class="controls">
                                        <input class="form-control" id="date" name="date" type="datetime-local" value="2017-07-31">
                                    </div>
                                </div>
                           </div>

                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">Vehículo
                                <i class="fa fa-car" aria-hidden="true"></i>
                            </h3>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::text('brand')!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('model')!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::select('type',
                                    ['moto' => 'Moto', 'coche' => 'Coche', '3' => '3.5 a 4.5 Ton', '4' => '5 a 9 Ton', '5' => 'Mas de 10 Ton'], null)
                                !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::number('load', ['min' => '0'])!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('plate')!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('color')!!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::number('inventory', ['min' => '0'])!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::select('key',
                                    ['si' => 'Si', 'no' => 'No'], null)
                                !!}
                            </div>
                        </div>

                        <div class="box-header with-border">
                            <h3 class="box-title">Ubicación
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            </h3>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::text('username')!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('origin')!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('destination')!!}
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
                                    'Rafael' => 'Rafael', 'Deberín' => 'Deberín'], null)
                                !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::select('unit', $units, null, ['empty' => 'Seleccione una unidad']) !!}
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
