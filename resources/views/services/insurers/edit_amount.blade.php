@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-6">
            <solid-box color="danger" title="Editar costo ID={{ $insurerService->id }}">
                {!! Form::open(['method' => 'POST', 'route' => 'service.insurer.updateAmount'])!!}
                    <div class="row">
                        <div class="col-md-6">
                            <B>Aseguradora:</B> <dd>{{ $insurerService->insurer->name }}</dd>
                        </div>
                        <div class="col-md-6">
                            <B>Fecha y hora del servicio:</B> <dd>{{ fdate($insurerService->date_assignment, 'l, j F Y h:i a') }}</dd>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <B>Ruta:</B> <dd>{{ $insurerService->origin }} - {{ $insurerService->destination }}</dd>
                        </div>
                        <div class="col-md-6">
                            <B>Vehiculo:</B> <dd>{{ $insurerService->brand }} - {{ $insurerService->type }} - {{ $insurerService->color }}</dd>
                        </div>
                    </div>
                    <h4>Horas extra</h4>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('folio', 0, ['min' => '0', 'tpl' => 'templates/twolines']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('amount', 0, ['step' => '0.01', 'min' => '0', 'tpl' => 'templates/twolines']) !!}
                        </div>
                    </div>

                    <input type="hidden" name="id" value="{{ $insurerService->id }}">
                    <hr>
                    {!! Form::submit('Actualizar', ['class' => 'btn btn-danger pull-right'])!!}
                {!! Form::close()!!}
            </solid-box>
        </div>
    </div>
@endsection
