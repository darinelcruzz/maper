@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo servicio</h3>
                </div>

                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'service.store']) !!}

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('type',
                                    ['1' => 'Servicio', '2' => 'Vialidad', '3' => 'Transito', '4' => 'Aseguradoras', '5' => 'Publico en general', '6' => 'Fiscalia'], null,
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
                        <h4>Vehículo</h4>
                        {--!! Field::text('description', ['tpl' => 'templates/withicon'], ['icon' => 'pencil-square-o'])!!}
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
