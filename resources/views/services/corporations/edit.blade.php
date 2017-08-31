@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar servicio Público General</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'service.corporation.change']) !!}

                    <div class="box-body">

                        @include('templates.principal')
                        @include('templates.car')
                        @include('templates.ubication')
                        @include('templates.unit')
                        @if($service->status != 'corralon')
                            @include('templates.pay')
                            <input type="hidden" name="view" value="editPayed">
                        @else
                            <input type="hidden" name="view" value="edit">
                        @endif

                    </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                      <input type="hidden" name="id" value="{{ $service->id }}">
                      <input type="hidden" name="status" value="{{ $service->status }}">
                    {!! Form::submit('Siguiente', ['class' => 'btn btn-black btn-block']) !!}
                  </div>
                  <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
