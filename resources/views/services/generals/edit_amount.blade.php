@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-6">
            <solid-box color="danger" title="Editar costo ID={{ $service->id }}">
                {!! Form::open(['method' => 'POST', 'route' => ['service.general.updateAmount', $service]])!!}
                    <div class="row">
                        <div class="col-md-6">
                            <B>Cliente:</B> <dd>{{ $service->client->name }}</dd>
                        </div>
                        <div class="col-md-6">
                            <B>Fecha y hora del servicio:</B> <dd>{{ fdate($service->date_service, 'l, j F Y h:i a') }}</dd>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <B>Ruta:</B> <dd>{{ $service->origin }} - {{ $service->destination }}</dd>
                        </div>
                        <div class="col-md-6">
                            <B>Vehiculo:</B> <dd>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</dd>
                        </div>
                    </div>
                    <h4>Editar</h4>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('amount', $service->amount, ['step' => '0.01', 'min' => '0', 'tpl' => 'templates/twolines']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('maneuver', $service->maneuver, ['step' => '0.01', 'min' => '0', 'tpl' => 'templates/twolines']) !!}
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ $service->id }}">
                    <hr>
                    @if ($service->amount == 0)
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-danger pull-right'])!!}
                    @endif
                {!! Form::close()!!}
            </solid-box>
        </div>
    </div>
@endsection
