@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="{{ $service->client->name }} ID = {{ $service->id }}" color="default">
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
                </div>
                <div class="box-footer">
                    <input type="hidden" name="status" value="cancelado">
                    @if (auth()->user()->level == 1)
                        {!! Form::submit('Cancelar', ['class' => 'btn btn-danger btn-block']) !!}
                        <p>(Todos los extras relacionados se volverán 0)</p>
                    @endif
                </div>
            </solid-box>
        </div>
    </div>
@endsection
