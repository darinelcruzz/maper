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
	</div>
	@include('cash.services')
	@include('cash.ingresses')


	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">
				<icon-box color="info" icon="money">
					<p>Efectivo</p>
					<h3>$ {{ $methodsA['Efectivo'] + $methodsB['Efectivo'] }}</h3>
				</icon-box>
	    	</div>

			<div class="col-md-4">
				<icon-box color="info" icon="credit-card">
					<p>Tarjeta débito</p>
					<h3>$ {{ $methodsA['T. Debito'] + $methodsB['T. Debito'] }}</h3>
				</icon-box>
	    	</div>

			<div class="col-md-4">
				<icon-box color="info" icon="credit-card-alt">
					<p>Tarjeta crédito</p>
					<h3>$ {{ $methodsA['T. Credito'] + $methodsB['T. Credito'] }}</h3>
				</icon-box>
	    	</div>

			<div class="col-md-4">
				<icon-box color="info" icon="pencil">
					<p>Cheques</p>
					<h3>$ {{ $methodsA['Cheque'] + $methodsB['Cheque'] }}</h3>
				</icon-box>
	    	</div>

			<div class="col-md-4">
				<icon-box color="info" icon="exchange">
					<p>Transferencias</p>
					<h3>$ {{ $methodsA['Transferencia'] + $methodsB['Transferencia'] }}</h3>
				</icon-box>
			</div>

			<div class="col-md-4">
				<icon-box color="danger" icon="calendar">
					<p>Crédito</p>
					<h3>$ {{ $methodsB['Credito'] + $methodsC['Credito'] + $methodsD['Credito'] }}</h3>
				</icon-box>
			</div>

			<div class="col-md-12">
				<div class="small-box bg-green">
					<div class="inner">
						<p>Ingresos Totales</p>
						<h3>$ {{ $total }}</h3>
					</div>
					<div class="icon">
						<i class="fa fa-dollar"></i>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection
