@extends('admin')

@section('main-content')

    <div id="payment" class="row">
        <div class="col-md-8">
            <solid-box title="{{ $service->client->name }}" color="default">
                {!! Form::open(['method' => 'POST', 'route' => ['service.general.change', $service]]) !!}
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Fecha y hora:</B>
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
                                <B>Descripción:</B>
                                <dd>{{ $service->description }}</dd>
                            </td>
                            <td>
                                <B>Importe estimado:</B>
                                <dd>${{ $service->total }}</dd>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <br>

                @include('templates.pay')

                <div class="box-footer">
                    <input type="hidden" name="date_out" value="{{ $out }}">
                    @if (auth()->user()->level == 1 || $service->status != 'pagado')
                        {!! Form::submit('Pagar', ['class' => 'btn btn-black btn-block']) !!}
                    @endif
                </div>
            </solid-box>
        </div>
    </div>
@endsection
