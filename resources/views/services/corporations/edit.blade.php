@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar servicio Público General</h3>
                </div>

                {!! Form::open(['method' => 'POST', 'route' => 'service.corporation.change']) !!}
                    <div class="box-body">
                        @include('templates.principal')
                        @include('templates.car')
                        @include('templates.ubication')
                        @include('templates.unit')

                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $service->id }}">
                        <input type="hidden" name="status" value="{{ $service->status }}">
                        @if ($service->status != 'liberado')
                            {!! Form::submit('Siguiente', ['class' => 'btn btn-black btn-block']) !!}
                        @endif
                  </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
