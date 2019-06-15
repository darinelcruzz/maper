@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Editar usuario {{ $user->mail }}" color="warning">
                <!-- form start -->
                {!! Form::open(['method' => 'POST', 'route' => 'user.update', 'class' => 'form-horizontal']) !!}
                  <div class="box-body">
                    {!! Field::text('name', $user->name,['label' => 'Nombre', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::password('password', ['label' => 'Contraseña', 'tpl' => 'templates/oneline']) !!}
                    {!! Field::password('password2', ['label' => 'Repite contraseña', 'tpl' => 'templates/oneline']) !!}

                    {!! Field::select('level',
                        ['1' => 'Administración', '2' => 'Contabilidad'], $user->level,
                        ['label' => 'Jerarquía', 'template' => 'templates/oneline', 'empty' => 'Seleccione un puesto']) !!}
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                      <input type="hidden" name="id" value="{{ $user->id }}">
                    {!! Form::submit('Editar', ['class' => 'btn btn-warning btn-block']) !!}
                  </div>
                  <!-- /.box-footer -->
                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
