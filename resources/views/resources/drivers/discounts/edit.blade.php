@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-5">
            <simple-box title="Editar bonificación" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'discount.update', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        {!! Field::text('reason', $discount->reason, ['tpl' => 'templates/oneline']) !!}
                        {!! Field::date('discounted_at', $discount->discounted_at, ['tpl' => 'templates/oneline', 'label' => 'Fecha']) !!}
                        {!! Field::number('amount', $discount->amount,['tpl' => 'templates/oneline', 'step' => '0.01', 'min' => '0']) !!}
                        {!! Field::select('driver_id', $drivers,  $discount->driver_id, ['tpl' => 'templates/oneline', 'empty' => 'Seleccione empleado', 'label' => 'Empleado']) !!}
                        {!! Field::select('type', ['0' => 'Descuento', '1' => 'Bonificación'], $discount->type, ['tpl' => 'templates/oneline', 'empty' => 'Seleccione empleado']) !!}
                    </div>

                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $discount->id }}">
                        @if (auth()->user()->level == 1)
                            {!! Form::submit('Modificar', ['class' => 'btn btn-danger btn-block']) !!}
                        @endif
                    </div>
                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
