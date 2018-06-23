@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Editar cliente" color="warning">
                {!! Form::open(['method' => 'POST', 'route' => 'client.change', 'class' => 'form-horizontal']) !!}
                    <div class="box-footer">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-warning btn-block']) !!}
                    </div>

                {!! Form::close() !!}
                </simple-box>
            </div>
        </div>
    @endsection
