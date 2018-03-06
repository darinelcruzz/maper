@extends('admin')

@section('htmlheader_title')
    General
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo servicio General</h3>
                </div>
                {!! Form::open(['method' => 'POST', 'route' => 'service.general.store']) !!}

                <div class="box-body">

                    @include('templates.principal')
                    @include('templates.car')
                    @include('templates.ubication')
                    @include('templates.unit')


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="status" value="pendiente">
                    <input type="hidden" name="service" value="General">
                    <input type="hidden" name="view" value="create">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::submit('Pagado', ['class' => 'btn btn-success btn-block', 'name' => 'pagado']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::submit('Crédito', ['class' => 'btn btn-danger btn-block', 'name' => 'credito']) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
