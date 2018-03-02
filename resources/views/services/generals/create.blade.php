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
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'service.general.store']) !!}

                <div class="box-body">

                    @include('templates.principal')
                    @include('templates.car')
                    @include('templates.ubication')
                    @include('templates.unit')
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            {!! Field::select('credit',
                                ['1' => 'Si', '2' => 'No'], isset($service) ? $service->lot: null, ['empty' => '¿Será a crédito?'])
                            !!}
                        </div>
                    </div>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="status" value="pendiente">
                    <input type="hidden" name="service" value="General">
                    <input type="hidden" name="view" value="create">
                    {!! Form::submit('Siguiente', ['class' => 'btn btn-black btn-block']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
