@extends('admin')

@section('main-content')
	<div class="row">
		<div class="col-md-5">
			<solid-box title="Buscar" color="box-primary">
				{--!! Form::open(['method' => 'POST', 'route' => 'service.cash']) !!}
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
		<div class="col-md-8">
			<data-table-com title="Ingresos"
		        example="example1" color="box-success">
		        <template slot="header">
		            <tr>
		                <th>ID</th>
		                <th>Servicio</th>
		                <th>Tipo</th>
                        <th>Forma de Pago</th>
		                <th>Monto</th>
		            </tr>
                    <tr>
                        <td>12</td>
                        <td>Transito del Estado</td>
                        <td>VW Jetta</td>
                        <td>Efectivo</td>
                        <td>$600</td>
                    </tr>
		        </template>


				<template slot="footer">
					<tr>
						<td></td><td></td><td></td>
						<td><b>Total:</b></td>
						<td>$ 600 </td>
					</tr>
				</template>
		    </data-table-com>
		</div>

		<div class="col-md-4">
			<data-table-com title="Egresos"
		        example="example2" color="box-danger">
		        <template slot="header">
		            <tr>
		                <th>Producto</th>
		                <th>Monto</th>
		            </tr>
                    <tr>
                        <td><b>Gasolina</b></td>
                        <td>$ 200 </td>
                    </tr>
		        </template>


				<template slot="footer">
					<tr>
						<td><b>Total:</b></td>
						<td>$ 200 </td>
					</tr>
				</template>
		    </data-table-com>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
  			<div class="small-box bg-green">
    			<div class="inner">
    				<p>Ingresos Totales</p>
      				<h3>$ 600</h3>
    			</div>
    			<div class="icon">
      				<i class="fa fa-dollar"></i>
    			</div>
  			</div>
    	</div>

    	<div class="col-md-4">
  			<div class="small-box bg-red">
    			<div class="inner">
    				<p>Egresos Totales</p>
      				<h3>$ 200</h3>
    			</div>
    			<div class="icon">
      				<i class="fa fa-dollar"></i>
    			</div>
  			</div>
	    </div>

		<div class="col-md-4">
			<div class="small-box bg-primary">
				<div class="inner">
					<p>Ganancia</p>
					<h3>$ 400</h3>
				</div>
				<div class="icon">
					<i class="fa fa-dollar"></i>
				</div>
			</div>
		</div>
    </div>
@endsection
