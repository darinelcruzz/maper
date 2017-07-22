@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo servicio</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'service.store']) !!}

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('service',
                                    ['1' => 'Fiscalia', '2' => 'Vialidad', '3' => 'Transito', '4' => 'Aseguradoras', '5' => 'Publico en general'], null,
                                    ['tpl' => 'templates/withicon'], ['icon' => 'list'])
                                !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::select('description',
                                    ['1' => 'Arrastre', '2' => 'Colisión'], null,
                                    ['tpl' => 'templates/withicon'], ['icon' => 'pencil-square-o'])
                                !!}
                            </div>
                        </div>
                        <hr>

                        <div class="box-header with-border">
                            <h3 class="box-title">Vehículo</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::text('brand', ['tpl' => 'templates/withicon'], ['icon' => 'car'])!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('model', ['tpl' => 'templates/withicon'], ['icon' => 'car'])!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('type', ['tpl' => 'templates/withicon'], ['icon' => 'car'])!!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::text('plate', ['tpl' => 'templates/withicon'], ['icon' => 'cc-stripe'])!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('color', ['tpl' => 'templates/withicon'], ['icon' => 'paint-brush'])!!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::number('inventory', ['tpl' => 'templates/withicon', 'min' => '0'], ['icon' => 'list-ol'])!!}
                            </div>
                        </div>
                    </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                    {!! Form::submit('Siguiente', ['class' => 'btn btn-black btn-block']) !!}
                  </div>
                  <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
