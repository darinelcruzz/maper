@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Agregar nueva aseguradora" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'insurer.store', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        {!! Field::text('name', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('business_name', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('rfc', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('address', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('phone', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('reception', ['label' => 'Número de recepción', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::text('observations', ['tpl' => 'templates/oneline']) !!}
                    </div>

                    <div class="box-footer">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>

@endsection
