@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Nuevo empleado" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'resources.driver.store', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        {!! Field::text('name', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::time('start_hour', '08:00',['tpl' => 'templates/oneline']) !!}
                        {!! Field::time('end_hour', '18:00',['tpl' => 'templates/oneline']) !!}
                        {!! Field::number('base_salary', 0, ['tpl' => 'templates/oneline', 'step' => '0.01', 'min' => '0']) !!}
                        {!! Field::select('type', ['conductor' => 'Conductor', 'oficina' => 'Oficina'], null, 
                            ['tpl' => 'templates/oneline', 'empty' => 'Seleccione tipo de empleado']) 
                        !!}
                    </div>

                    <div class="box-footer">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
