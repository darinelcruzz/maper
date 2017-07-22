@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar cliente</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'client.change', 'class' => 'form-horizontal']) !!}

                    <div class="box-body">
                        {!! Field::text('name', $client->name, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('city', $client->city, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('phone', $client->phone, ['tpl' => 'templates/oneline']) !!}
                        <hr>
                        {!! Field::text('address', $client->address, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('rfc', $client->rfc, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::email('email', $client->email, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('contact', $client->contact, ['tpl' => 'templates/oneline']) !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $client->id }}">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-info btn-block']) !!}
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
