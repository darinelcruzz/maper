@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Editar proveedor" color="warning">

                {!! Form::open(['method' => 'POST', 'route' => 'provider.change', 'class' => 'form-horizontal']) !!}

                    <div class="box-body">
                        {!! Field::text('name', $provider->name, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('city', $provider->city, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('phone', $provider->phone, ['tpl' => 'templates/oneline']) !!}
                        <hr>
                        {!! Field::text('address', $provider->address, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('rfc', $provider->rfc, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::email('email', $provider->email, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('contact', $provider->contact, ['tpl' => 'templates/oneline']) !!}
                    </div>

                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $provider->id }}">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-warning btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
