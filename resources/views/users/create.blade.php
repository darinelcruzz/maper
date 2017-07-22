@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo usuario</h3>
                </div>
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'user.store', 'class' => 'form-horizontal']) !!}
                  <div class="box-body">
                    {!! Field::text('name', ['label' => 'Nombre', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::text('email', ['label' => 'Usuario', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::password('password', ['label' => 'Contraseña', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::password('password2', ['label' => 'Repite contraseña', 'tpl' => 'templates/oneline']) !!}

                    {!! Field::select('level',
                        ['1' => 'Admin', '2' => 'Ventas', '3' => 'Gerente', '4' => 'Ingeniero', '5' => 'Operador'],
                        ['label' => 'Jerarquía', 'template' => 'templates/oneline']) !!}
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                      <input type="hidden" name="user" value="1">
                    {!! Form::submit('Agregar', ['class' => 'btn btn-black btn-block']) !!}
                  </div>
                  <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
