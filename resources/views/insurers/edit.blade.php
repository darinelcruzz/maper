@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Editar aseguradora" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => ['insurer.update', $insurer], 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        {!! Field::text('name', $insurer->name, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('business_name', $insurer->business_name, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('rfc', $insurer->rfc, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('address', $insurer->address, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('phone', $insurer->phone, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('reception', $insurer->reception, ['label' => 'Número de recepción', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::text('observations', $insurer->observations, ['tpl' => 'templates/oneline']) !!}
                    </div>

                    <div class="box-footer">
                        {!! Form::submit('Modificar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>

@endsection
