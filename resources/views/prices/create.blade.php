@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo precio</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'price.store', 'class' => 'form-horizontal']) !!}
                  <div class="box-body">
                    {!! Field::text('name', ['tpl' => 'templates/oneline']) !!}
                    {!! Field::number('amount', ['step' => '0.01', 'tpl' => 'templates/oneline']) !!}
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
