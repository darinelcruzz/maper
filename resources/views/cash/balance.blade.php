@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-5">
			<solid-box title="Buscar" color="box-primary" collapsed="collapsed-box">
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

	<div class="row">
		<div class="col-lg-8 col-md-12">
			<data-table-com title="Ingresos" example="example1" color="box-success">
		        <template slot="header">
		            <tr>
		                <th>ID</th>
		                <th>Servicio</th>
		                <th>Tipo</th>
                        <th>Forma de Pago</th>
		                <th>Monto</th>
		            </tr>
				</template>
				<template slot="body">
					@foreach ($all as $row)
						<tr>
	                        <td>{{ $row->id }}</td>
	                        <td>{{ $row->service == 'General' ? $row->clientr->name : $row->service }}</td>
	                        <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
	                        <td>{{ $row->pay }}</td>
	                        <td>${{ $row->total }}</td>
	                    </tr>
					@endforeach

					@foreach ($creditAll as $row)
						<tr>
	                        <td>{{ $row->id }}</td>
	                        <td>{{ $row->clientr->name }}</td>
	                        <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
	                        <td>{{  $row->pay_credit ? $row->pay_credit . " (". $row->pay . ")" : $row->pay }}</td>
	                        <td>${{ $row->total }}</td>
	                    </tr>
					@endforeach
		        </template>
				<template slot="footer">
					<tr>
						<td></td><td></td><td></td>
						<td><b>Total:</b></td>
						<td>$ {{ $total }} </td>
					</tr>
				</template>
		    </data-table-com>
		</div>

		<div class="col-lg-4 col-md-12">
			<div class="col-lg-6 col-md-4">
	  			<div class="small-box bg-info">
	    			<div class="inner">
	    				<p>Efectivo</p>
	      				<h3>$ {{ $methodsA['Efectivo'] + $methodsB['Efectivo'] }}</h3>
	    			</div>
	    			<div class="icon">
	      				<i class="fa fa-money"></i>
	    			</div>
	  			</div>
	    	</div>

			<div class="col-lg-6 col-md-4">
	  			<div class="small-box bg-info">
	    			<div class="inner">
	    				<p>Tarjeta débito</p>
	      				<h3>$ {{ $methodsA['T. Debito'] + $methodsB['T. Debito'] }}</h3>
	    			</div>
	    			<div class="icon">
	      				<i class="fa fa-credit-card"></i>
	    			</div>
	  			</div>
	    	</div>

			<div class="col-lg-6 col-md-4">
	  			<div class="small-box bg-info">
	    			<div class="inner">
	    				<p>Tarjeta crédito</p>
	      				<h3>$ {{ $methodsA['T. Credito'] + $methodsB['T. Credito'] }}</h3>
	    			</div>
	    			<div class="icon">
	      				<i class="fa fa-credit-card-alt"></i>
	    			</div>
	  			</div>
	    	</div>

			<div class="col-lg-6 col-md-4">
	  			<div class="small-box bg-info">
	    			<div class="inner">
	    				<p>Cheques</p>
	      				<h3>$ {{ $methodsA['Cheque'] + $methodsB['Cheque'] }}</h3>
	    			</div>
	    			<div class="icon">
	      				<i class="fa fa-pencil"></i>
	    			</div>
	  			</div>
	    	</div>

			<div class="col-lg-6 col-md-4">
				<div class="small-box bg-info">
					<div class="inner">
						<p>Transferencias</p>
						<h3>$ {{ $methodsA['Transferencia'] + $methodsB['Transferencia'] }}</h3>
					</div>
					<div class="icon">
						<i class="fa fa-exchange"></i>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-4">
				<div class="small-box bg-danger">
					<div class="inner">
						<p>Crédito</p>
						<h3>$ {{ $methodsA['Credito'] + $methodsB['Credito'] }}</h3>
					</div>
					<div class="icon">
						<i class="fa fa-calendar"></i>
					</div>
				</div>
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
