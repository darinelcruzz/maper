@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-5">
            <simple-box title="Agregar bonificación" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'discount.store', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        {!! Field::text('reason', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::date('discounted_at', Date::now(), ['tpl' => 'templates/oneline', 'label' => 'Fecha']) !!}
                        {!! Field::number('amount', 0, ['tpl' => 'templates/oneline', 'step' => '0.01', 'min' => '0']) !!}
                        {!! Field::select('driver_id', $drivers, null, ['tpl' => 'templates/oneline', 'empty' => 'Seleccione empleado', 'label' => 'Empleado']) !!}
                        {!! Field::select('type', ['0' => 'Descuento', '1' => 'Bonificación'], null, ['tpl' => 'templates/oneline', 'empty' => 'Seleccione empleado']) !!}
                    </div>

                    <div class="box-footer">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            </simple-box>
        </div>
        <div class="col-md-7">
            <simple-box title="Descuentos" color="danger">
                <table class="table table-bordered table-striped no-pagination">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Razón</th>
                            <th>Empleado</th>
                            <th>Fecha</th>
                            <th>Importe</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($discounts as $discount)
                            <tr>
                                <td>{{ $discount->id }}</td>
                                <td>{{ $discount->reason }}</td>
                                <td>{{ $discount->driver->name }}</td>
                                <td>{{ fdate($discount->discounted_at, 'd-m-Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($discount->amount) }}</td>
                                <td><a href="{{ route('discount.edit', $discount) }}"><i class="fa fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </simple-box>
            <simple-box title="Bonificaciones" color="success">
                <table class="table table-bordered table-striped no-pagination">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Razón</th>
                            <th>Empleado</th>
                            <th>Fecha</th>
                            <th>Importe</th>
                            <th><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bonuses as $bonus)
                            <tr>
                                <td>{{ $bonus->id }}</td>
                                <td>{{ $bonus->reason }}</td>
                                <td>{{ $bonus->driver->name }}</td>
                                <td>{{ fdate($bonus->discounted_at, 'd-m-Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($bonus->amount) }}</td>
                                <td><a href="{{ route('discount.edit', $bonus) }}"><i class="fa fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </simple-box>
        </div>
    </div>
@endsection
