@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-6">
            <solid-box color="danger" title="Editar horas Aseguradora ID= {{ $insurerService->id }}">
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
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('km', $insurerService->km, ['tpl' => 'templates/withicon', 'min' => '0'], ['icon' => 'road'])!!}
                        </div>
                    </div>


                    <h4>Horas extra</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th><small></small></th>
                                    <th><small>NOMBRE</small></th>
                                    <th><small>ACTIVIDAD</small></th>
                                    <th style="width: 20%; text-align: center;"><small>PAGO</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th><small>PRINCIPAL</small></th>
                                    <td>{{ $insurerService->driver->nickname }}</td>
                                    <td>OPERADOR</td>
                                    <td>
                                        <input type="number" name="extra_driver" class="form-control" value="{{ $insurerService->extra_driver ?? 0 }}" {{ ($insurerService->extra_driver < 10 || auth()->user()->level == 1) ? '': 'disabled' }}>
                                    </td>
                                </tr>
                                @if($insurerService->helper)
                                <tr>
                                    <th></th>
                                    <td>{{ $insurerService->helperr->nickname ?? 'X'}}</td>
                                    <td>APOYO</td>
                                    <td>
                                        <input type="number" name="extra_helper" class="form-control" value="{{ $insurerService->extra_helper ?? 0 }}" {{ ($insurerService->extra_helper < 10 || auth()->user()->level == 1) ? '': 'disabled' }}>
                                    </td>
                                </tr>
                                @endif
                                @forelse($extras as $extra)
                                    <tr>
                                        <th><small>{{ $loop->index == 0 ? 'EXTRAS': '' }}</small></th>
                                        <td>{{ $extra->driver->nickname }}</td>
                                        <td>{{ $extra->type ? 'OPERADOR' : 'APOYO' }}</td>
                                        <td>
                                            <input type="hidden" name="extras[{{ $loop->index }}][id]" value="{{ $extra->id }}">
                                            <input type="number" name="extras[{{ $loop->index }}][amount]" class="form-control" value="{{ $extra->extra }}" {{ ($extra->extra < 10 || auth()->user()->level == 1) ? '': 'disabled' }}>
                                        </td>
                                    </tr>
                                @empty
                                    <td colspan="4"><em><small>SIN EXTRAS</small></em></td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <input type="hidden" name="id" value="{{ $insurerService->id }}">
                    <hr>
                    {!! Form::submit('GUARDAR', ['class' => 'btn btn-danger pull-right'])!!}
                {!! Form::close()!!}
            </solid-box>
        </div>

        <div class="col-md-6">
            <solid-box color="danger" title="Agregar operadores extras" button collapsed>
                {!! Form::open(['method' => 'POST', 'route' => 'extraDrivers.store'])!!}
                    <div class="row">
                        <div class="col-md-12">
                            {!! Field::select('driver_id', $drivers, null, ['empty' => 'Seleccione al operador', 'tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                            {!! Field::select('type', ['1' => 'Operador', '0' => 'Apoyo'], null, ['empty' => '¿Operador o Apoyo?', 'tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                            {!! Field::number('extra', ['tpl' => 'templates/withicon', 'min' => '0'], ['icon' => 'money']) !!}
                        </div>
                    </div>
                        <input type="hidden" name="insurer_service_id" value="{{ $insurerService->id }}">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-danger pull-right'])!!}
                {!! Form::close()!!}
            </solid-box>
        </div>
    </div>
    @endsection
