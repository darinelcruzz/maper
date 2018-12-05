@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-7">
            <solid-box color="danger" title="Editar horas">
                {!! Form::open(['method' => 'POST', 'route' => 'service.insurer.updateHour'])!!}
                    <div class="row">
                        <div class="col-md-6">
                            <B>Fecha y hora del servicio:</B> <dd>{{ fdate($insurerService->date_assignment, 'l, j F Y h:i a') }}</dd>
                        </div>
                        <div class="col-md-6">
                            <B>Vehiculo:</B> <dd>{{ $insurerService->brand }} - {{ $insurerService->type }} - {{ $insurerService->color }}</dd>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::datetimelocal('date_contact', isset($insurerService) ? fdate($insurerService->date_contact, 'Y-m-d\TH:i') : NULL, ['tpl' => 'templates/withicon', 'min' => '0'], ['icon' => 'calculator']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::datetimelocal('date_end', isset($insurerService) ? fdate($insurerService->date_end, 'Y-m-d\TH:i') : NULL, ['tpl' => 'templates/withicon', 'min' => '0'], ['icon' => 'calculator']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::datetimelocal('date_return', isset($insurerService) ? fdate($insurerService->date_return, 'Y-m-d\TH:i') : date('Y-m-d\TH:i'), ['tpl' => 'templates/withicon', 'min' => '0'], ['icon' => 'calculator']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('inventory', $insurerService->inventory, ['tpl' => 'templates/withicon', 'step' => '0.01', 'min' => '0'], ['icon' => 'calculator'])!!}
                        </div>
                    </div>

                    <h4>Horas extra</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <span align="center">
                                <p><em>Operador</em></p>
                                <h4>{{ $insurerService->driver->nickname }}</h4>
                            </span>
                        </div>
                        @if ($insurerService->extra_driver < 1 || auth()->user()->level == 1)
                            <div class="col-md-6">
                                {!! Field::number('extra_driver', $insurerService->extra_driver, ['label' => 'Pago', 'tpl' => 'templates/withicon'], ['icon' => 'dollar'])!!}
                            </div>
                        @else
                            <div class="col-md-6">
                                {!! Field::number('extra_driver', $insurerService->extra_driver, ['label' => 'Pago (si aplica):', 'tpl' => 'templates/withicon', 'disabled'], ['icon' => 'dollar'])!!}
                            </div>
                        @endif
                    </div>

                    @if ($insurerService->helper)
                        <b>Apoyo</b>
                        <div class="row">
                            <div class="col-md-6">
                                <span align="center">
                                    <h4>{{ $insurerService->helperr->nickname }}</h4>
                                </span>
                            </div>
                            @if ($insurerService->extra_helper < 1 || auth()->user()->level == 1)
                                <div class="col-md-6">
                                    {!! Field::number('extra_helper', $insurerService->extra_helper, ['label' => 'Pago', 'tpl' => 'templates/withicon'], ['icon' => 'dollar'])!!}
                                </div>
                            @else
                                <div class="col-md-6">
                                    {!! Field::number('extra_helper', $insurerService->extra_helper, ['label' => 'Pago (si aplica):', 'tpl' => 'templates/withicon', 'disabled'], ['icon' => 'dollar'])!!}
                                </div>
                            @endif
                        </div>
                    @endif

                    <input type="hidden" name="id" value="{{ $insurerService->id }}">
                    <hr>
                    {!! Form::submit('Guardar', ['class' => 'btn btn-danger pull-right'])!!}
                {!! Form::close()!!}
            </solid-box>
        </div>
    </div>
@endsection
