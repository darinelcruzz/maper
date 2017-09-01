getShortDate(@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="{{ $service->clientr->name }}" color="box-default" collapsed=''>
                {!! Form::open(['method' => 'POST', 'route' => 'service.general.change']) !!}
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Fecha y hora:</B>
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

                <div class="col-md-5">
                    {!! Field::text('reason', isset($service) ? $service->reason: null)!!}
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="status" value="cancelado">
                    <input type="hidden" name="id" value="{{ $service->id }}">
                    <input type="hidden" name="date_out" value="{{ date('Y-m-d\TH:i') }}">
                    <input type="hidden" name="view" value="cancelado">
                    {!! Form::submit('Cancelar', ['class' => 'btn btn-danger btn-block']) !!}
                </div>
            </solid-box>
        </div>
    </div>
@endsection