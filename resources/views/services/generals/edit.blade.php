@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10">
            <div class="box box-danger box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Público General #{{ $service->id }}</h3>
                </div>

                {!! Form::open(['method' => 'POST', 'route' => ['service.general.update', $service]]) !!}
                    <div class="box-body">
                        @include('templates.principal')
                        @include('templates.car')
                        @include('templates.ubication')
                        @include('templates.unit')

                    </div>
                    <div class="box-footer">
                        @if (auth()->user()->level == 1 || $service->status != 'pagado')
                            {!! Form::submit('Siguiente', ['class' => 'btn btn-black btn-block']) !!}
                        @endif
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
