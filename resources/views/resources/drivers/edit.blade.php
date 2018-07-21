@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Editar empleado" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'resources.driver.change', 'class' => 'form-horizontal']) !!}

                    <div class="box-body">
                        {!! Field::text('name', $driver->name, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::time('start_hour', $driver->start_hour, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::time('end_hour',  $driver->end_hour, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::number('base_salary', $driver->base_salary, ['tpl' => 'templates/oneline', 'step' => '0.01', 'min' => '0']) !!}
                        {!! Field::select('type', ['operador' => 'Operador', 'oficina' => 'Oficina'], $driver->type, 
                            ['tpl' => 'templates/oneline', 'empty' => 'Seleccione tipo de empleado']) 
                        !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $driver->id }}">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
