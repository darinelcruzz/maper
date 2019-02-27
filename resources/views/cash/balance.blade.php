@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-5">
			<solid-box title="Buscar" color="primary" collapsed button>
				{!! Form::open(['method' => 'POST', 'route' => 'admin.cash']) !!}
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							{!! Field::date('date', $date, ['tpl' => 'templates/withicon'],
							['icon' => 'calendar-check-o']) !!}
							{!! Form::submit('Buscar', ['class' => 'btn btn-primary pull-right']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</solid-box>
		</div>
		<div class="col-md-5">
			<span class="pull-right">
				<a href="{{ route('service.insurer.create') }}" class="btn btn-danger">Aseguradoras</a>
				<a href="{{ route('service.general.create') }}" class="btn btn-success">General</a>
				<a href="{{ route('service.corporation.create') }}" class="btn btn-warning">Corporaciones</a>
				<a href="{{ route('service.show') }}" class="btn btn-info">Listado</a>
			</span>
		</div>
	</div>
	@include('cash.services')
	@include('cash.ingresses')


	<div class="row">
		<div class="col-md-12">
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
    </div>
@endsection
