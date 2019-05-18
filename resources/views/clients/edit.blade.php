@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-7">
            <solid-box title="Modificar datos del cliente" color="warning">
                {!! Form::open(['method' => 'POST', 'route' => ['client.update', $client]]) !!}
                    <div class="box-body">
                        {!! Field::text('name', $client->name, ['tpl' => 'templates/withicon'], ['icon' => 'user']) !!}
                        {!! Field::text('city', $client->city, ['tpl' => 'templates/withicon'], ['icon' => 'map']) !!}
                            
                        <div class="row">
                            <div class="col-md-8">
                                {!! Field::text('phone', $client->phone, ['tpl' => 'templates/withicon'], ['icon' => 'phone']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::number('days', $client->days, ['tpl' => 'templates/withicon'], ['icon' => 'sun-o']) !!}
                            </div>
                        </div>
                        
                        {!! Field::text('social', $client->social, ['tpl' => 'templates/withicon'], ['icon' => 'industry']) !!}

                        <div class="row">
                            <div class="col-md-8">
                                {!! Field::text('address', $client->address, ['tpl' => 'templates/withicon'], ['icon' => 'home']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::number('cp', $client->cp, ['label' => 'C.P.', 'tpl' => 'templates/withicon'], ['icon' => 'map-signs']) !!}
                            </div>
                        </div>                                           
                                            
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::email('email', $client->email, ['tpl' => 'templates/withicon'], ['icon' => 'at']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('rfc', $client->rfc, ['tpl' => 'templates/withicon'], ['icon' => 'barcode']) !!}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('contact', $client->contact, ['tpl' => 'templates/withicon'], ['icon' => 'comment']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('cellphone', $client->cellphone, ['tpl' => 'templates/withicon'], ['icon' => 'mobile-phone']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="box-footer">
                        {!! Form::submit('Guardar cambios', ['class' => 'btn btn-warning btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>
@endsection
