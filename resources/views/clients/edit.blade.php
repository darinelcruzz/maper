@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Editar cliente" color="warning">

                {!! Form::open(['method' => 'POST', 'route' => 'client.change', 'class' => 'form-horizontal']) !!}

                    <div class="box-body">
                        {!! Field::text('name', $client->name, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('city', $client->city, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('phone', $client->phone, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::number('days', $client->days, ['tpl' => 'templates/oneline']) !!}
                        <hr>
                        {!! Field::text('address', $client->address, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::number('cp', $client->cp, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('rfc', $client->rfc, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::email('email', $client->email, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('contact', $client->contact, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('cellphone', $client->cellphone, ['tpl' => 'templates/oneline']) !!}
                    </div>

                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $client->id }}">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-warning btn-block']) !!}
                    </div>

                    {!! Form::close() !!}
                </simple-box>
            </div>
        </div>
    @endsection
