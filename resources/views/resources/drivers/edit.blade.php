@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Nuevo operador" color="warning">
                {!! Form::open(['method' => 'POST', 'route' => 'resources.driver.change', 'class' => 'form-horizontal']) !!}

                    <div class="box-body">
                        {!! Field::text('name', $driver->name, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::time('start_hour', $driver->start_hour, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::time('end_hour',  $driver->end_hour, ['tpl' => 'templates/oneline']) !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $driver->id }}">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-warning btn-block']) !!}
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
