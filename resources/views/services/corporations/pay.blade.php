@extends('admin')

@section('main-content')

    <div id="payment" class="row">
        <div class="col-md-8">
            <solid-box title="{{ $service->service }}" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => ['service.corporation.change', $service]]) !!}
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Fecha y hora entrada:</B>
                                <dd>{{ fdate($service->date_service, 'l, j F Y h:i a') }}</dd>
                            </td>
                            <td>
                                <B>Origen:</B>
                                <dd>{{ $service->origin }}</dd>
                            </td>
                            <td>
                                <B>Destino:</B>
                                <dd>{{ $service->destination }}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <B>Inventario:</B>
                                <dd>{{ $service->inventory }}</dd>
                            </td>
                            <td>
                                <B>Arrastre estimado:</B>
                                <dd>$ {{ $service->amount }}</dd>
                            </td>
                            <td>
                                <B>Maniobra estimado:</B>
                                <dd>$ {{ $service->maneuver }}</dd>
                            </td>
                        </tr>
                        <tr>
                            @if ($service->status == 'liberado')
                                <td>
                                    <b>Fecha y hora salida</b>
                                    <dd>{{ fdate($service->date_out, 'l, j F Y h:i a') }}</dd>
                                </td>
                            @endif
                            <td>
                                <b>Pensión</b>
                                <dd>{{ $penalty }}días X ${{ $cost/$penalty }} = ${{ $cost }}</dd>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>

                <div class="row">
                    <div class="col-md-8">
                        {!! Field::text('releaser', isset($service) ? $service->releaser: null, ['tpl' => 'templates/twolines'])!!}
                    </div>
                </div>
                <payment-box corp :service="{{ $service }}" :pension="{{ $cost or 0 }}" date="{{ $out }}">
                    {!! Field::select('client_id', $clients, null, ['empty' => 'Seleccione al cliente', 'class' => 'select2', 'tpl' => 'templates/twolines'])!!}
                </payment-box>

                <br>

                <div class="box-footer">
                    <input type="hidden" name="status" value="liberado">
                    <input type="hidden" name="released_at" value="{{ $out }}">
                    <input type="hidden" name="pension" value="{{ $cost }}">
                    @if (auth()->user()->level == 1 || $service->status != 'liberado')
                        <button type="submit" class='btn btn-danger btn-md pull-right'>L I B E R A R &nbsp;&nbsp;<i class='fa fa-sign-out'></i></button>
                        {{-- {!! Form::submit(, ['class' => 'btn btn-danger btn-md']) !!} --}}
                    @endif()
                </div>
            </solid-box>
        </div>
    </div>
@endsection
