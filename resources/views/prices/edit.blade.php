@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar unidad</h3>
                </div>

                {!! Form::open(['method' => 'POST', 'route' => 'price.change', 'class' => 'form-horizontal']) !!}

                    <div class="box-body">
                        {!! Field::text('name', $price->name,['tpl' => 'templates/oneline']) !!}
                        {!! Field::select('type',
                            ['otros' => 'Otros', 'localG' => 'Local general', 'localC' => 'Local coorporaciones', 'Ruta 1' => 'Ruta 1', 'Ruta 2' => 'Ruta 2',
                            'Ruta 3' => 'Ruta 3', 'Ruta 4' => 'Ruta 4', 'Ruta 5' => 'Ruta 5'], $price->type,
                            ['empty' => '¿A que corresponde?', 'tpl' => 'templates/oneline'])!!}
                        {!! Field::number('km', $price->km,['min' => '0', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::number('moto', $price->moto,['min' => '0', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::number('car', $price->car,['min' => '0', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::number('ton3', $price->ton3,['min' => '0', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::number('ton5', $price->ton5,['min' => '0', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::number('ton10', $price->ton10,['min' => '0', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::text('observation', $price->observation,['tpl' => 'templates/oneline']) !!}
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $price->id }}">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-black btn-block']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
