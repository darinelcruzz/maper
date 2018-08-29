@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Nueva factura" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'invoice.store']) !!}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('folio') !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('date') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::number('amount', ['step' => '0.01', 'min' => '0', 'v-model' => 'total']) !!}
                            </div>
                            <div class="col-md-6">
                                <p>IVA</p>
                                <input type="number" name="iva2" :value="iva" disabled>
                                <input type="hidden" name="iva" :value="iva">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-offset-6 col-md-6">
                                {!! Field::number('retention', ['step' => '0.01', 'min' => '0']) !!}
                            </div>
                        </div>
                        <data-table example='1'>
                            {{ drawHeader('id', 'Asignación', 'Folio', 'Vehiculo', 'Monto') }}
                            <template slot="body">
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{!! Form::checkboxes('services', [$service->id => $service->id]) !!}</td>
                                        <td>{{ fdate($service->date_assignment, 'j/M/y') }}</td>
                                        <td>{{ $service->folio }}</td>
                                        <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                                        <td>{{ fnumber($service->total) }}</td>
                                    </tr>
                                @endforeach
                            </template>
                        </data-table>
                        <input type="hidden" name="insurer_id" value="{{ $insurer->id }}">
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
