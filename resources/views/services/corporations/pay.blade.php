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
                        <tr>
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

                <div class="box-header with-border">
                    <h3 class="box-title">Pago
                        <i class="fa fa-dollar" aria-hidden="true"></i>
                    </h3>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        {!! Field::number('amount', 0,['label' => 'Arrastre', 'min' => '0', 'step' => '.01'])!!}
                    </div>
                    <div class="col-md-4">
                        {!! Field::number('maneuver',0,['min' => '0', 'step' => '.01'])!!}
                    </div>
                    <div class="col-md-4">
                       {!! Field::number('pension', $cost,['disabled'=> 'true', 'min' => '0', 'step' => '.01'])!!}
                   </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                       <h4><B>Subtotal $</B></h4>
                   </div>
                </div>
                <div class="row">
                    <div  class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        {!! Field::text('reason')!!}
                    </div>
                    <div class="col-md-4">
                        {!! Field::number('discount', 0,['min' => '0', 'step' => '.01'])!!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                       <h3><B>Total $</B></h3>
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
