@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar operador</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'resources.driver.change', 'class' => 'form-horizontal']) !!}

                    <div class="box-body">
                        {!! Field::text('name', $driver->name, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::time('start_hour', $driver->start_hour, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::time('end_hour',  $driver->end_hour, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::number('driver_hour', $driver->driver_hour, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::number('helper_hour', $driver->helper_hour, ['tpl' => 'templates/oneline']) !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $driver->id }}">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-black btn-block']) !!}
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
