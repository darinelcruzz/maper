@extends('admin')

@section('htmlheader_title', 'Editar Horas Extras')

@section('main-content')

    <div class="row">
        <div class="col-md-7">
            <solid-box color="danger" title="Editar horas id = {{ $service->id }}">
                {!! Form::open(['method' => 'POST', 'route' => 'service.updateHour'])!!}
                    <div class="row">
                        <div class="col-md-7">
                            {!! Field::datetimelocal('date_return', isset($service) ? fdate($service->date_return, 'Y-m-d\TH:i') : date('Y-m-d\TH:i'), ['tpl' => 'templates/withicon', 'min' => '0'], ['icon' => 'calculator']) !!}
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
                                <h4>{{ $service->driver->nickname }}</h4>
                            </span>
                        </div>
                        @if ($service->extra_driver < 10 || auth()->user()->level == 1)
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
                                    <h4>{{ $service->helperr->nickname }}</h4>
                                </span>
                            </div>
                            @if ($service->extra_helper < 10 || auth()->user()->level == 1)
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
                @if (count($extras) > 0)
                    <br><hr>
                    <h4>Operadores/Apoyos extras</h4>
                    @foreach ($extras as $extra)
                        <div class="row">
                            <div class="col-md-6">
                                <span align="center">
                                    <p><em>{{ $extra->type ? 'Operador' : 'Apoyo' }}</em></p>
                                    <h4>{{ $extra->driver->nickname }}</h4>
                                </span>
                            </div>
                            <div class="col-md-6">
                                {!! Field::number('extra_driver', $extra->extra, ['label' => 'Pago:', 'tpl' => 'templates/withicon', 'disabled'], ['icon' => 'dollar'])!!}
                            </div>
                        </div>
                    @endforeach
                @endif
            </solid-box>
        </div>

        <div class="col-md-4 col-md-offset-1">
            <solid-box color="danger" title="Agregar operadores" button>
                {!! Form::open(['method' => 'POST', 'route' => 'extraDrivers.store'])!!}
                    <div class="row">
                        <div class="col-md-12">
                            {!! Field::select('driver_id', $drivers, null, ['empty' => 'Seleccione al operador', 'tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                            {!! Field::select('type', ['1' => 'Operador', '0' => 'Apoyo'], null, ['empty' => '¿Operador o Apoyo?', 'tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                            {!! Field::number('extra', ['tpl' => 'templates/withicon', 'min' => '0'], ['icon' => 'money']) !!}
                        </div>
                    </div>
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-danger pull-right'])!!}
                {!! Form::close()!!}
            </solid-box>
        </div>
    </div>
@endsection
