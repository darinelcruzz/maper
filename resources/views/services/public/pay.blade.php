@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-8">
            <solid-box title="Inventario {{ $service->service }}" color="box-default" collapsed=''>
                @include('templates.headTable')
                        <tr>
                            <td>
                                <B>Fecha y hora:</B>
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
                                <B>Importe estimado:</B>
                                <dd>${{ $service->amount }}</dd>
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
                        {!! Field::number('amount' ,['label' => 'Arrastre', 'min' => '0', 'step' => '.01'])!!}
                    </div>
                    <div class="col-md-4">
                        {!! Field::number('amount',['label' => 'Maniobra','min' => '0', 'step' => '.01'])!!}
                   </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <input type="hidden" name="status" value="pagado">
                    {!! Form::submit('Siguiente', ['class' => 'btn btn-black btn-block']) !!}
                </div>
            </solid-box>
        </div>
    </div>
@endsection
