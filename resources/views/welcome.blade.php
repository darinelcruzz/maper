@extends('admin')

@section('main-content')
<h2>Bienvenido(a), {{ auth()->user()->name }}</h2>
    <div align="center" valign="middle">
    	<img width="45%" height="45%" src="{{ asset('/img/MAPER.png') }}">
    </div>
@endsection
