<!DOCTYPE html>
<html lang="en">
@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader', ['headerTitle' => 'Gruas Maper'])
@show

<body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <b>GRUAS MAPER</b>
            </div>

            <div class="login-box-body">

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8" align="center" valign="middle">
                        <img width="55%" height="55%" src="{{ asset('/img/MAPER.png') }}">
                    </div>
                </div>

                {!! Form::open(['method' => 'POST', 'route' => 'login', 'class' => 'form-horizontal']) !!}

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        {!! Field::text('email',
                            ['label' => 'Usuario', 'value' => old('user'), 'tpl' => 'templates/withicon'],
                            ['icon' => 'user-circle']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        {!! Field::password('password',
                            ['tpl' => 'templates/withicon'], ['icon' => 'key']) !!}
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        {!! Form::submit('Entrar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
</body>

</html>
