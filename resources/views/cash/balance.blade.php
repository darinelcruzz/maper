@extends('admin')

@section('main-content')

	<div class="row">
		<div class="col-md-3">
			{!! Form::open(['method' => 'post', 'route' => 'admin.cash']) !!}
		        <div class="input-group input-group-sm">
	                <input type="date" name="date" class="form-control" value="{{ $date }}">
	                <span class="input-group-btn">
	                    <button type="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i></button>
	                </span>
	            </div>
		    {!! Form::close() !!}
		</div>
		<div class="col-md-5"></div>
		<div class="col-md-4">
			<span class="pull-right">
				<div class="btn-group">
					<a href="{{ route('service.insurer.create') }}" class="btn btn-danger">Aseguradoras</a>
					<a href="{{ route('service.general.create') }}" class="btn btn-success">General</a>
					<a href="{{ route('service.corporation.create') }}" class="btn btn-warning">Corporaciones</a>
					<a href="{{ route('service.show') }}" class="btn btn-info">Listado</a>
				</div>
			</span>
		</div>
	</div>

	<br>

	@include('cash.services')
	@include('cash.ingresses')

	<div class="row">
		<div class="col-md-4">
			<icon-box color="info" icon="money">
				<p>Efectivo</p>
				<h3>{{ fnumber($efectivo) }}</h3>
			</icon-box>
    	</div>

		<div class="col-md-4">
			<icon-box color="info" icon="credit-card">
				<p>Tarjeta débito</p>
				<h3>{{ fnumber($debito) }}</h3>
			</icon-box>
    	</div>

		<div class="col-md-4">
			<icon-box color="info" icon="credit-card-alt">
				<p>Tarjeta crédito</p>
				<h3>{{ fnumber($tcredito) }}</h3>
			</icon-box>
    	</div>

		<div class="col-md-4">
			<icon-box color="info" icon="pencil">
				<p>Cheques</p>
				<h3>{{ fnumber($cheque) }}</h3>
			</icon-box>
    	</div>

		<div class="col-md-4">
			<icon-box color="info" icon="exchange">
				<p>Transferencias</p>
				<h3>{{ fnumber($transferencia) }}</h3>
			</icon-box>
		</div>

		<div class="col-md-4">
			<icon-box color="danger" icon="calendar">
				<p>Crédito</p>
				<h3>{{ fnumber($credito) }}</h3>
			</icon-box>
		</div>
    </div>

    <div class="row">
    	<div class="col-md-12">
			<div class="small-box bg-green">
				<div class="inner">
					<p>Ingresos Totales</p>
					<h3>{{ fnumber($total) }}</h3>
				</div>
				<div class="icon">
					<i class="fa fa-dollar"></i>
				</div>
			</div>
		</div>
    </div>
@endsection
