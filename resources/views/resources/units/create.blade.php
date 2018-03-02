@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Nuevo unidad" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'resources.unit.store', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        {!! Field::text('name', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::number('number', ['label' => 'Número economico', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::text('description', ['tpl' => 'templates/oneline']) !!}
                    </div>

                    <div class="box-footer">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
