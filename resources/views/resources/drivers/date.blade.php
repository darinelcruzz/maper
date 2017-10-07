@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Imprimir formato</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'resources.driver.format']) !!}

                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('start', $date, ['tpl' => 'templates/withicon', 'label' => 'Inicio'],
                            ['icon' => 'calendar-check-o']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::date('end', $date, ['tpl' => 'templates/withicon', 'label' => 'Fin'],
                            ['icon' => 'calendar-check-o']) !!}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit('Buscar', ['class' => 'btn btn-black btn-block']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
