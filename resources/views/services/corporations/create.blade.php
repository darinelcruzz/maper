@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo servicio Corporaciones</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'service.corporation.store']) !!}

                <div class="box-body">

                    @include('templates.principal')
                    @include('templates.ubication')
                    @include('templates.car')
                    @include('templates.unit')

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="status" value="corralon">
                    <input type="hidden" name="view" value="create">
                    {!! Form::submit('Siguiente', ['class' => 'btn btn-black btn-block']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
