@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-6">
            <solid-box title="Agregar nueva aseguradora" color="box-danger">
                {!! Form::open(['method' => 'POST', 'route' => 'insurer.store']) !!}

                    {!! Field::text('name', ['tpl' => 'templates/withicon'], ['icon' => 'comment-o']) !!}
                    {!! Field::text('business_name', ['tpl' => 'templates/withicon'], ['icon' => 'building-o']) !!}
                    {!! Field::text('rfc', ['tpl' => 'templates/withicon'], ['icon' => 'id-card-o']) !!}
                    {!! Field::text('address', ['tpl' => 'templates/withicon'], ['icon' => 'map-marker']) !!}
                    {!! Field::text('phone', ['tpl' => 'templates/withicon'], ['icon' => 'phone']) !!}

                    {!! Form::submit('Agregar', ['class' => 'btn btn-danger pull-right']) !!}

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
