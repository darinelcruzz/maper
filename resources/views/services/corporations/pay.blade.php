@extends('admin')

@section('main-content')

    <div id="payment" class="row">
        <div class="col-md-8">
            <solid-box title="{{ $service->service }}" color="default">
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
                <payment-box corp :service="{{ $service }}" :pension="{{ $cost or 0 }}"></payment-box>

                <div class="box-footer">
                    <input type="hidden" name="status" value="liberado">
                    <input type="hidden" name="date_out" value="{{ $out }}">
                    <input type="hidden" name="pension" value="{{ $cost }}">
                    @if (auth()->user()->level == 1 || $service->status != 'liberado')
                        {!! Form::submit('Liberar', ['class' => 'btn btn-black btn-block']) !!}
                    @endif()
                </div>
            </solid-box>
        </div>
    </div>
@endsection
