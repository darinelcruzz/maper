@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-6">
            <solid-box color="danger" title="Editar horas">
                {!! Form::open(['method' => 'POST', 'route' => 'service.updateHour'])!!}
                    <div class="row">
                        <div class="col-md-7">
                            <div id="field_date" class="form-group">
                                <label for="date_return" class="control-label">
                                    Fecha y hora:
                                </label>
                                <div class="controls">
                                    <input class="form-control" id="date_return" name="date_return" type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime($service->date_return))  }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            {!! Field::number('inventory', $service->inventory, ['tpl' => 'templates/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'calculator'])!!}
                        </div>
                    </div>
                    <h4>Horas extra</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <span align="center">
                                <p><em>Operador</em></p>
                                <h4>{{ $service->driver->name }}</h4>
                            </span>
                        </div>
                        <div class="col-md-4">
                            {!! Field::number('extra_driver', $service->extra_driver, ['label' => 'Pago (si aplica):', 'tpl' => 'templates/withicon'], ['icon' => 'dollar'])!!}
                        </div>
                    </div>

                    @if ($service->helper)
                        <b>Apoyo</b>
                        <div class="row">
                            <div class="col-md-6">
                                <span align="center">
                                    <h4>{{ $service->helper }}</h4>
                                </span>
                            </div>
                            <div class="col-md-6">
                                {!! Field::number('extra_helper', 0, ['label' => 'Pago (si aplica):', 'tpl' => 'templates/withicon'], ['icon' => 'dollar'])!!}
                            </div>
                        </div>
                    @endif

                    <input type="hidden" name="id" value="{{ $service->id }}">
                    <hr>
                    {!! Form::submit('Guardar', ['class' => 'btn btn-danger pull-right'])!!}
                {!! Form::close()!!}
            </solid-box>
        </div>
    </div>
@endsection
