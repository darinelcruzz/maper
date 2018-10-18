<div class="row">
	<div class="col-md-12">
		<data-table-com title="Ingresos del {{ fdate($date, 'd/M/Y', 'Y-m-d') }}" example="example2" color="success" button>
			{{ drawHeader('ID', '<i class="fa fa-clock-o"></i>', 'Inv', 'Folio', 'Servicio', 'Descripción', 'Ruta/operador', 'Vehiculo', 'Estatus', 'Método', 'Monto') }}
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
									<ddi to="{{ route('service.editHour', ['id' => $row->id]) }}"
										icon="clock-o" text="Hora de regreso/Extras">
									</ddi>
									@if (auth()->user()->level == 1)
										<ddi to="{{ route('service.general.update', ['id' => $row->id]) }}"
											icon="edit" text="Editar Pago">
										</ddi>
									@endif
								@else
									<ddi to="{{ route('service.corporation.printLetter', ['id' => $row->id]) }}"
										icon="print" text="Imprimir">
									</ddi>
									<ddi to="{{ route('service.editHour', ['id' => $row->id]) }}"
										icon="clock-o" text="Hora de regreso/Extras">
									</ddi>
									@if (auth()->user()->level == 1)
										<ddi to="{{ route('service.corporation.update', ['id' => $row->id]) }}"
											icon="edit" text="Editar Pago">
										</ddi>
									@endif
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
						<td>{{ $row->origin }} - {{ $row->destination }} <br> {{ $row->driver->nickname }}{{ $row->helper ? ' - ' . $row->helperr->nickname : '' }}</td>
						<td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
						<td>{{ $row->status }}</td>
						<td>{{ $row->pay }}</td>
						<td>{{ fnumber($row->total) }}</td>
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
										icon="clock-o" text="Hora de regreso/Extras">
									</ddi>
									<ddi to="{{ route('service.general.cancel', ['id' => $row->id]) }}"
										icon="times" text="Muerto">
									</ddi>
								@else
									<ddi to="{{ route('service.corporation.pay', ['id' => $row->id]) }}"
										icon="hand-peace-o" text="Liberar">
									</ddi>
									<ddi to="{{ route('service.editHour', ['id' => $row->id]) }}"
										icon="clock-o" text="Hora de regreso/Extras">
									</ddi>
								@endif
							</dropdown>
						</td>
						<td>{{ $row->inventory }}</td>
						<td></td>
						<td><a href="{{ route('client.details', ['id' => $row->client->id]) }}"> {{ $row->client->name }} </a></td>
						<td>{{ $row->description }}</td>
						<td>{{ $row->origin }} - {{ $row->destination }} <br> {{ $row->driver->nickname }}{{ $row->helper ? ' - ' . $row->helperr->nickname : '' }}</td>
						<td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
						<td>{{ $row->status == 'corralon' ? 'pendiente' : $row->status }}</td>
						<td>{{ $row->pay_credit ? $row->pay_credit : $row->pay }}</td>
						<td>{{ fnumber($row->total) }}</td>
					</tr>
					@php
						$sum += $row->total;
					@endphp
				@endforeach

				@foreach ($invoicesPayed as $row)
					<tr>
						<td>{{ $row->id }}</td>
						<td></td>
						<td></td>
						<td><a href="{{ route('invoice.show', ['id' => $row->id]) }}"> {{ $row->folio }} </a></td>
						<td><a href="{{ route('insurer.details', ['id' => $row->insurer->id]) }}"> {{ $row->insurer->name }}</a></td>
						<td>Factura</td>
						<td></td>
                        <td></td>
                        <td>{{ $row->status }}</td>
                        <td>{{ $row->method }}</td>
                        <td>{{ fnumber($row->amount) }}</td>
					</tr>
					@php
					$sum += $row->amount;
					@endphp
				@endforeach
			</template>
			<template slot="footer">
				<tr>
					<td colspan="9"></td>
					<td><b>Total:</b></td>
					<td>{{ fnumber($sum) }} </td>
				</tr>
			</template>
		</data-table-com>
	</div>
</div>
