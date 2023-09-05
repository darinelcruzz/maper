@extends('admin')

@section('main-content')
<h2>Bienvenido(a), {{ auth()->user()->name }}</h2>
{{-- @if($days >= 8) --}}
    <div align="center" valign="middle">
        <br><br><br><br><br><br>
        <h1>Mas de {{ floor($days) }} día(s) sin hacer corte</h1>
        <h1>último corte el {{ fdate($cut, 'd/m/Y', 'Y-m-d') }}</h1>
    </div>
{{-- @else --}}
    <div align="center" valign="middle">
    	<img width="45%" height="45%" src="{{ asset('/img/MAPER.png') }}">
    </div>
{{-- @endif --}}
@endsection
