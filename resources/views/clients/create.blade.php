@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo cliente</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'client.store', 'class' => 'form-horizontal']) !!}

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
                    <!-- /.box-body -->
                    <div class="box-footer">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-black btn-block']) !!}
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
