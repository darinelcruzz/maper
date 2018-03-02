@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Nuevo proveedor" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'provider.store', 'class' => 'form-horizontal']) !!}

                    <div class="box-body">
                        {!! Field::text('name', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('city', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('phone', ['tpl' => 'templates/oneline']) !!}
                        <hr>
                        {!! Field::text('address', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('rfc', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::email('email', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('contact', ['tpl' => 'templates/oneline']) !!}
                    </div>

                    <div class="box-footer">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
                    
                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
