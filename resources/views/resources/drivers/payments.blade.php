{{-- @extends('admin')

@section('main-content') --}}
    <div class="row">
        <div class="col-md-5">
            <simple-box title="Agregar bonificación" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'discount.store', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        {!! Field::text('reason', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::date('discounted_at', Date::now(), ['tpl' => 'templates/oneline', 'label' => 'Fecha']) !!}
                        {!! Field::number('amount', 0, ['tpl' => 'templates/oneline', 'step' => '0.01', 'min' => '0']) !!}
                        {!! Field::select('driver_id', $drivers, null, ['tpl' => 'templates/oneline', 'empty' => 'Seleccione empleado', 'label' => 'Empleado'])
                        !!}
                    </div>

                    <div class="box-footer">
                        <input type="hidden" name="type" value="1">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            </simple-box>
        </div>

        <div class="col-md-7">
            <simple-box title="Bonificaciones" color="danger">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Razón</th>
                            <th>Empleado</th>
                            <th>Fecha</th>
                            <th>Importe</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($discounts as $discount)
                            <tr>
                                <td>{{ $discount->id }}</td>
                                <td>{{ $discount->reason }}</td>
                                <td>{{ $discount->driver->name }}</td>
                                <td>{{ $discount->discounted_at }}</td>
                                <td>{{ fnumber($discount->amount) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </simple-box>
        </div>
    </div>
{{-- @endsection --}}
