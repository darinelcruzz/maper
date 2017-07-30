@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar unidad</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'unit.change', 'class' => 'form-horizontal']) !!}

                    <div class="box-body">
                        {!! Field::text('name', $unit->name, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('number', $unit->number, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::text('description', $unit->description, ['tpl' => 'templates/oneline']) !!}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $unit->id }}">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-info btn-block']) !!}
                    </div>
                    <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
