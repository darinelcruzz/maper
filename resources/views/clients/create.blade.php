@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-7">
            <solid-box title="Nuevo cliente" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'client.store']) !!}
                    <div class="box-body">
                        {!! Field::text('name', ['tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                        {!! Field::text('city', ['tpl' => 'templates/withicon'], ['icon' => 'map']) !!}
                            
                        <div class="row">
                            <div class="col-md-8">
                                {!! Field::text('phone', ['tpl' => 'templates/withicon'], ['icon' => 'phone']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::number('days', ['tpl' => 'templates/withicon'], ['icon' => 'sun-o']) !!}
                            </div>
                        </div>
                        
                        {!! Field::text('social', ['tpl' => 'templates/withicon'], ['icon' => 'industry']) !!}

                        <div class="row">
                            <div class="col-md-8">
                                {!! Field::text('address', ['tpl' => 'templates/withicon'], ['icon' => 'home']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::number('cp', ['label' => 'C.P.', 'tpl' => 'templates/withicon'], ['icon' => 'map-signs']) !!}
                            </div>
                        </div>                                           
                                            
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::email('email', ['tpl' => 'templates/withicon'], ['icon' => 'at']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('rfc', ['tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('contact', ['tpl' => 'templates/withicon'], ['icon' => 'comment']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('cellphone', ['tpl' => 'templates/withicon'], ['icon' => 'mobile-phone']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>
@endsection
