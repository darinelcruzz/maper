@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-6">
            <solid-box color="danger" title="Editar horas id = {{ $service->id }}">
                {!! Form::open(['method' => 'POST', 'route' => 'service.updateHour'])!!}
                    <div class="row">
                        <div class="col-md-7">
                            <div id="field_date" class="form-group">
                                <label for="date_return" class="control-label">
                                    Fecha y hora de regreso:
                                </label>
                                <div class="controls">
                                    <input class="form-control" id="date_return" name="date_return" type="datetime-local" value="{{ $service->date_return == NULL ?  date('Y-m-d\TH:i') : date('Y-m-d\TH:i', strtotime($service->date_return))  }}">
                                </div>
                            </div>
                        </div>
                        @if ($service->inventory < 1)
                            <div class="col-md-5">
                                {!! Field::number('inventory', ['tpl' => 'templates/withicon', 'min' => '0'], ['icon' => 'calculator'])!!}
                            </div>
                        @else
                            <div class="col-md-5">
                                {!! Field::number('inventory', $service->inventory, ['tpl' => 'templates/withicon', 'min' => '0', 'disabled'], ['icon' => 'calculator'])!!}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-7">
                        <div class="">
                            <B>Fecha y hora del servicio:</B> <dd>{{ fdate($service->date_service, 'l, j F Y h:i a') }}</dd>
                        </div>
                    </div>
                    <br><br>
                    <h4>Horas extra</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <span align="center">
                                <p><em>Operador</em></p>
                                <h4>{{ $service->driver->name }}</h4>
                            </span>
                        </div>
                        @if ($service->extra_driver < 1 || auth()->user()->level == 1)
                            <div class="col-md-6">
                                {!! Field::number('extra_driver', $service->extra_driver, ['label' => 'Pago', 'tpl' => 'templates/withicon'], ['icon' => 'dollar'])!!}
                            </div>
                        @else
                            <div class="col-md-6">
                                {!! Field::number('extra_driver', $service->extra_driver, ['label' => 'Pago (si aplica):', 'tpl' => 'templates/withicon', 'disabled'], ['icon' => 'dollar'])!!}
                            </div>
                        @endif
                    </div>

                    @if ($service->helper)
                        <b>Apoyo</b>
                        <div class="row">
                            <div class="col-md-6">
                                <span align="center">
                                    <h4>{{ $service->helperr->name }}</h4>
                                </span>
                            </div>
                            @if ($service->extra_helper < 1 || auth()->user()->level == 1)
                                <div class="col-md-6">
                                    {!! Field::number('extra_helper', $service->extra_helper, ['label' => 'Pago', 'tpl' => 'templates/withicon'], ['icon' => 'dollar'])!!}
                                </div>
                            @else
                                <div class="col-md-6">
                                    {!! Field::number('extra_helper', $service->extra_helper, ['label' => 'Pago (si aplica):', 'tpl' => 'templates/withicon', 'disabled'], ['icon' => 'dollar'])!!}
                                </div>
                            @endif
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
