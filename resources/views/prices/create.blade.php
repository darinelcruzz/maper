@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Nuevo precio" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'price.store', 'class' => 'form-horizontal']) !!}
                    <div class="box-body">
                        {!! Field::text('name', ['tpl' => 'templates/oneline']) !!}
                        {!! Field::select('type',
                            ['otros' => 'Otros', 'localG' => 'Local general', 'localC' => 'Local coorporaciones', 'Ruta 1' => 'Ruta 1', 'Ruta 2' => 'Ruta 2',
                            'Ruta 3' => 'Ruta 3', 'Ruta 4' => 'Ruta 4', 'Ruta 5' => 'Ruta 5'], null,
                            ['empty' => '¿A que corresponde?', 'tpl' => 'templates/oneline'])!!}
                        {!! Field::number('km', ['min' => '0', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::number('moto', ['min' => '0', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::number('car', ['min' => '0', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::number('ton3', ['min' => '0', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::number('ton5', ['min' => '0', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::number('ton10', ['min' => '0', 'tpl' => 'templates/oneline']) !!}
                        {!! Field::text('observation', ['tpl' => 'templates/oneline']) !!}
                    </div>
                    <div class="box-footer">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
