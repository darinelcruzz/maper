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

	<div class="row">
		<div class="col-md-12">
			<data-table-com title="Servicios del {{  fdate($date, 'd/F/Y', 'Y-m-d') }}" example="example1" color="success" button>
		        <template slot="header">
		            <tr>
		                <th>ID</th>
						<th><i class="fa fa-cogs"></i></th>
						<th>Inv</th>
						<th>Folio</th>
		                <th>Servicio</th>
						<th>Descripción</th>
		                <th>Tipo</th>
						<th>Status</th>
                        <th>Forma de Pago</th>
		                <th>Monto</th>
		            </tr>
				</template>
				<template slot="body">
					@php
						$sum = 0;
					@endphp
					@foreach ($services as $row)
						@if ($row->date_service != $row->date_out)
							<tr>
								<td><a href="{{ route($row->service == 'General' ? 'service.general.details' : 'service.corporation.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
								<td>
									<dropdown color="success" icon="cogs">
										@if ($row->service == 'General')
											<ddi to="{{ route('service.general.pay', ['id' => $row->id]) }}"
												icon="dollar" text="Pagar">
											</ddi>
											<ddi to="{{ route('service.editHour', ['id' => $row->id]) }}"
												icon="clock-o" text="Hora de regreso">
											</ddi>
											<ddi to="{{ route('service.general.cancel', ['id' => $row->id]) }}"
												icon="times" text="Muerto">
											</ddi>
										@else
											<ddi to="{{ route('service.corporation.pay', ['id' => $row->id]) }}"
												icon="hand-peace-o" text="Liberar">
											</ddi>
											<ddi to="{{ route('service.editHour', ['id' => $row->id]) }}"
												icon="clock-o" text="Hora de regreso">
											</ddi>
										@endif
									</dropdown>
								</td>
								<td>{{ $row->inventory }}</td>
								<td></td>
								@if ($row->service == 'General')
									<td><a href="{{ route('client.details', ['id' => $row->client->id]) }}"> {{ $row->client->name }} </a></td>
								@else
									<td>{{ $row->service }}</td>
								@endif
								<td>{{ $row->description }}</td>
								<td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
								<td>
									{{ $row->status == 'corralon' ? 'pendiente' : $row->status }}{{ $row->status == 'liberado' ? fdate($row->date_out, ' (d/M/Y)') : '' }}{{ $row->status == 'liquidado' ? fdate($row->date_credit, ' (d/M/Y)') : '' }}
								</td>
								<td>{{ $row->pay == 'credito' ? $row->pay_credit : $row->pay }}</td>
								<td>${{ $row->total }}</td>
							</tr>
							@php
								$sum += $row->total;
							@endphp
						@endif
					@endforeach

					@foreach ($insurerServ as $row)
						<tr>
	                        <td><a href="{{ route('service.insurer.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
							<td>
								<dropdown color="success" icon="cogs">
								</dropdown>
							</td>
							<td>{{ $row->inventory }}</td>
							<td>{{ $row->folio }}</td>
	                        <td>{{ $row->insurer->name }}</td>
							<td>{{ $row->description }}</td>
	                        <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
							<td>{{ $row->status == 'corralon' ? 'pendiente' : $row->status }}</td>
	                        <td>{{ $row->pay_credit }}</td>
	                        <td>${{ $row->total }}</td>
	                    </tr>
						@php
							$sum += $row->total;
						@endphp
					@endforeach
				</template>
				<template slot="footer">
					<tr>
						<td colspan="8"></td>
						<td><b>Total:</b></td>
						<td>$ {{ $sum }} </td>
					</tr>
				</template>
		    </data-table-com>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<data-table-com title="Ingresos del {{  fdate($date, 'd/F/Y', 'Y-m-d') }}" example="example2" color="success" button>
		        <template slot="header">
		            <tr>
		                <th>ID</th>
						<th><i class="fa fa-cogs"></i></th>
						<th>Inv</th>
						<th>Folio</th>
		                <th>Servicio</th>
						<th>Descripción</th>
		                <th>Tipo</th>
						<th>Status</th>
                        <th>Forma de Pago</th>
		                <th>Monto</th>
		            </tr>
				</template>
				<template slot="body">
					@php
						$sum = 0;
					@endphp

					@foreach ($payed as $row)
						<tr>
	                        <td><a href="{{ route($row->service == 'General' ? 'service.general.details' : 'service.corporation.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
							<td>
								<dropdown color="success" icon="cogs">
									@if ($row->service == 'General')
										<ddi to="{{ route('service.general.pay', ['id' => $row->id]) }}"
											icon="dollar" text="Pagar">
										</ddi>
										<ddi to="{{ route('service.editHour', ['id' => $row->id]) }}"
											icon="clock-o" text="Hora de regreso">
										</ddi>
										<ddi to="{{ route('service.general.cancel', ['id' => $row->id]) }}"
											icon="times" text="Muerto">
										</ddi>
									@else
										<ddi to="{{ route('service.corporation.pay', ['id' => $row->id]) }}"
											icon="hand-peace-o" text="Liberar">
										</ddi>
										<ddi to="{{ route('service.editHour', ['id' => $row->id]) }}"
											icon="clock-o" text="Hora de regreso">
										</ddi>
									@endif
								</dropdown>
							</td>
							<td>{{ $row->inventory }}</td>
							<td></td>
							@if ($row->service == 'General')
								<td><a href="{{ route('client.details', ['id' => $row->client->id]) }}"> {{ $row->client->name }} </a></td>
							@else
								<td>{{ $row->service }}</td>
							@endif
							<td>{{ $row->description }}</td>
	                        <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
							<td>{{ $row->status }}</td>
	                        <td>{{ $row->pay }}</td>
	                        <td>${{ $row->total }}</td>
	                    </tr>
						@php
							$sum += $row->total;
						@endphp
					@endforeach

					@foreach ($credit as $row)
						<tr>
	                        <td><a href="{{ route($row->service == 'General' ? 'service.general.details' : 'service.corporation.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
							<td>
								<dropdown color="success" icon="cogs">
									@if ($row->service == 'General')
										<ddi to="{{ route('service.general.pay', ['id' => $row->id]) }}"
											icon="dollar" text="Pagar">
										</ddi>
										<ddi to="{{ route('service.editHour', ['id' => $row->id]) }}"
											icon="clock-o" text="Hora de regreso">
										</ddi>
										<ddi to="{{ route('service.general.cancel', ['id' => $row->id]) }}"
											icon="times" text="Muerto">
										</ddi>
									@else
										<ddi to="{{ route('service.corporation.pay', ['id' => $row->id]) }}"
											icon="hand-peace-o" text="Liberar">
										</ddi>
										<ddi to="{{ route('service.editHour', ['id' => $row->id]) }}"
											icon="clock-o" text="Hora de regreso">
										</ddi>
									@endif
								</dropdown>
							</td>
							<td>{{ $row->inventory }}</td>
							<td></td>
							<td><a href="{{ route('client.details', ['id' => $row->client->id]) }}"> {{ $row->client->name }} </a></td>
							<td>{{ $row->description }}</td>
	                        <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
							<td>{{ $row->status == 'corralon' ? 'pendiente' : $row->status }}</td>
	                        <td>{{ $row->pay_credit ? $row->pay_credit : $row->pay }}</td>
	                        <td>${{ $row->total }}</td>
	                    </tr>
						@php
							$sum += $row->total;
						@endphp
					@endforeach

		        </template>
				<template slot="footer">
					<tr>
						<td colspan="8"></td>
						<td><b>Total:</b></td>
						<td>$ {{ $sum }} </td>
					</tr>
				</template>
		    </data-table-com>
		</div>

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
