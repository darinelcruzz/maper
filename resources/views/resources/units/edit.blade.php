@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Nuevo operador" color="warning">

                {!! Form::open(['method' => 'POST', 'route' => 'resources.unit.change', 'class' => 'form-horizontal']) !!}

                    <div class="box-body">
                        {!! Field::text('name', $unit->name, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('number', $unit->number, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('description', $unit->description, ['tpl' => 'templates/oneline']) !!}
                    </div>

                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $unit->id }}">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-warning btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
