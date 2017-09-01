@extends('admin')

@section('main-content')

    <data-table col="col-md-8" title="Abonos anterioes" example="example1" color="box-primary">
        <template slot="header">
            <tr>
                <th>Fecha</th>
                <th>Monto</th>
                <th>Restante</th>
            </tr>
        </template>

        <template slot="body">
        </template>
    </data-table>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo precio</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'price.store', 'class' => 'form-horizontal']) !!}
                  <div class="box-body">
                    {!! Field::text('name', ['tpl' => 'templates/oneline']) !!}
                    {!! Field::select('type',
                        ['otros' => 'Otros', 'Ruta 1' => 'Ruta 1', 'Ruta 2' => 'Ruta 2', 'Ruta 3' => 'Ruta 3', 'Ruta 4' => 'Ruta 4',
                        'Ruta 5' => 'Ruta 5'], null, ['empty' => '¿A que corresponde?', 'tpl' => 'templates/oneline'])!!}
                    {!! Field::number('km', ['step' => '0.01', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::number('moto', ['step' => '0.01', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::number('car', ['step' => '0.01', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::number('ton3', ['step' => '0.01', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::number('ton5', ['step' => '0.01', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::number('ton10', ['step' => '0.01', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::text('observation', ['tpl' => 'templates/oneline']) !!}
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-black btn-block']) !!}
                  </div>
                  <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
