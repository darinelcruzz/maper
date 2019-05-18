@extends('admin')

@section('htmlheader_title')
    Corporaciones
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-6">
            <solid-box title="Buscar servicios liberados" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'admin.showReleased']) !!}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::date('start', date('Y-m-d'), ['tpl' => 'templates/twolines']) !!}
                           </div>
                            <div class="col-md-6">
                                {!! Field::date('end', date('Y-m-d'), ['tpl' => 'templates/twolines']) !!}
                           </div>
                        </div>
                        <div class="box-footer">
                            {!! Form::submit('Buscar', ['class' => 'btn btn-danger btn-block']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

    @include('templates.clientmodal')
@endsection
