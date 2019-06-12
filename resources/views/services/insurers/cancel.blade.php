@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="{{ $insurerService->insurer->name }} ID = {{ $insurerService->id }}" color="default">
                {!! Form::open(['method' => 'POST', 'route' => ['service.insurer.cancel', $insurerService]]) !!}
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Fecha y hora:</B>
                                <dd>{{ fdate($insurerService->date_assignment, 'l, j F Y h:i a') }}</dd>
                            </td>
                            <td>
                                <B>Origen:</B>
                                <dd>{{ $insurerService->origin }}</dd>
                            </td>
                            <td>
                                <B>Destino:</B>
                                <dd>{{ $insurerService->destination }}</dd>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <B>Inventario:</B>
                                <dd>{{ $insurerService->inventory }}</dd>
                            </td>
                            <td>
                                <B>Descripción:</B>
                                <dd>{{ $insurerService->description }}</dd>
                            </td>
                            <td>
                                <B>Importe estimado:</B>
                                <dd>${{ $insurerService->amount }}</dd>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('reason', isset($insurerService) ? $insurerService->reason: null)!!}
                    </div>
                </div>
                <div class="box-footer">
                    <input type="hidden" name="status" value="cancelado">
                    {!! Form::submit('Cancelar', ['class' => 'btn btn-danger btn-block']) !!}
                    <p>(Todos los extras relacionados se volverán 0)</p>
                </div>
            </solid-box>
        </div>
    </div>
@endsection
