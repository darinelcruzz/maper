@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-4">
            <simple-box title="Editar ticket" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'gas.store']) !!}
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('date') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('ticket', ['min' => '0']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('product',['Magna' => 'Magna', 'Premium' => 'Premium', 'Disel' => 'Disel'], ['empty' => 'Seleccione el producto'])!!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::select('type',['Gruas' => 'Gruas', 'Don Pepe' => 'Don Pepe', 'Piloto' => 'Piloto', 'Lavado' => 'Lavado'], ['empty' => 'Seleccione el tipo'])!!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('total', ['min' => '0', 'step' => '0.01']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('observations')!!}
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    {!! Form::submit('Editar', ['class' => 'btn btn-black btn-block']) !!}
                </div>

                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
