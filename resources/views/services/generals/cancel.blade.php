@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="{{ $service->client->name }}" color="default">
                {!! Form::open(['method' => 'POST', 'route' => ['service.general.cancel', $service]]) !!}
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
                                <dd>${{ $service->amount }}</dd>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('reason', isset($service) ? $service->reason: null)!!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::number('amount', isset($service) ? $service->amount: null)!!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        {!! Field::select('pay',
                            ['Efectivo' => 'Efectivo', 'T. Debito' => 'T. Debito', 'T. Credito' => 'T. Credito',
                            'Transferencia' => 'Transferencia', 'Cheque' => 'Cheque'], isset($service) ? $service->pay: null, ['empty' => '¿Cómo pagó?'])
                            !!}
                        </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="status" value="cancelado">
                    <input type="hidden" name="date_out" value="{{ date('Y-m-d\TH:i') }}">
                    {!! Form::submit('Cancelar', ['class' => 'btn btn-danger btn-block']) !!}
                </div>
            </solid-box>
        </div>
    </div>
@endsection
