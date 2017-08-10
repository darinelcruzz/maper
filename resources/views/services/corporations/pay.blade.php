@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="Inventario {{ $service->service }}" color="box-default" collapsed=''>
                {!! Form::open(['method' => 'POST', 'route' => 'service.corporation.change']) !!}
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Fecha y hora entrada:</B>
                                <dd>{{ $service->formatted_date }}</dd>
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
                    </tbody>
                </table>
                <br>
                <div class="box-header with-border">
                    <h3 class="box-title">Pago
                        <i class="fa fa-dollar" aria-hidden="true"></i>
                    </h3>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        {!! Field::number('amount', ['label' => 'Arrastre', 'min' => '0', 'step' => '.01'])!!}
                    </div>
                    <div class="col-md-4">
                        {!! Field::number('maneuver',['min' => '0', 'step' => '.01'])!!}
                   </div>
                   <div class="col-md-4">
                       {!! Field::number('pension', $cost,['disabled'=> 'true', 'min' => '0', 'step' => '.01'])!!}
                  </div>
                </div>
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
