@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo servicio Público General</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'service.public.store']) !!}

                <div class="box-body">
                    <div class="row">
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
                       <div class="col-md-4">
                           {!! Field::number('amount', ['min' => '0', 'step' => '.01'])!!}
                      </div>
                    </div>

                    @include('templates.car')
                    @include('templates.ubication')
                    @include('templates.unit')

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="status" value="pendiente">
                    <input type="hidden" name="service" value="Público general">
                    {!! Form::submit('Siguiente', ['class' => 'btn btn-black btn-block']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
