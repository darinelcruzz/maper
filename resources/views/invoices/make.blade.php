@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Nueva factura" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'invoice.persist']) !!}
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
                            <div class="col-md-4">
                                {!! Field::number('subtotal', ['step' => '0.01', 'min' => '0', 'v-model' => 'subtotal']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::number('iva', ['label' => 'I.V.A.', 'step' => '0.01', 'min' => '0', 'v-model' => 'iva']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::number('retention', ['step' => '0.01', 'min' => '0', 'v-model' => 'retention']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-8">
                                <h3>Total <span class="pull-right">$ @{{ total }}</span></h3>
                                <input type="hidden" name="amount" :value="total">
                            </div>
                        </div>

                        <data-table example='1'>
                            {{ drawHeader('id', 'Asignación', 'Folio', 'Vehiculo', 'Monto') }}
                            <template slot="body">
                                @foreach ($services as $service)
                                    <tr>
                                        <td>
                                            <input type="checkbox" :value="{{ $service }}" v-model="checked">
                                            {{ $service->id }}
                                        </td>
                                        <td>{{ fdate($service->date_service, 'j/M/y') }}</td>
                                        <td>{{ $service->folio }}</td>
                                        <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                                        <td>{{ fnumber($service->total) }}</td>
                                    </tr>
                                @endforeach
                            </template>

                            <template slot="footer">
                                <tr>
                                    <th colspan="3"></th>
                                    <th style="text-align: right">Total seleccionados</th>
                                    <td>$ @{{ services_sum }}</td>
                                </tr>
                            </template>
                        </data-table>
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                        <input type="hidden" name="type" value="service">
                        <input type="hidden" name="services" :value="selected_services">
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
