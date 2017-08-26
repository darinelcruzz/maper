@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="{{ $service->service }}" color="box-default" collapsed=''>
                {!! Form::open(['method' => 'POST', 'route' => 'service.corporation.change']) !!}
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Fecha y hora entrada:</B>
                                <dd>{{ $service->getDate('date_service') }}</dd>
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
                    </tbody>
                </table>
                <br>

                <div class="row">
                    <div class="col-md-4">
                        {!! Field::text('releaser')!!}
                    </div>
                </div>

                @include('templates.pay')

                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="id" value="{{ $service->id }}">
                    <input type="hidden" name="pension" value="{{ $cost }}">
                    <input type="hidden" name="status" value="liberado">
                    <input type="hidden" name="date_out" value="{{ date('Y-m-d\TH:i') }}">
                    {!! Form::submit('Liberar', ['class' => 'btn btn-black btn-block']) !!}
                </div>
            </solid-box>
        </div>
    </div>
@endsection
