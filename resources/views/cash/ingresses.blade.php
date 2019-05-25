<div class="row">
	<div class="col-md-12">
		<data-table-com title="Ingresos del {{ fdate($date, 'd/M/Y', 'Y-m-d') }}" example="example2" color="success" button>
			{{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'Descripción', 'Vehiculo', 'Ruta/operador', 'Servicio', 'Folio', 'Inv', 'Estatus', 'Método', 'Monto') }}
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
											<ddi to="{{ route('service.general.pay', ['id' => $row->id]) }}"
												icon="edit" text="Editar Pago">
											</ddi>
											<ddi to="{{ route('service.general.edit', ['id' => $row->id]) }}"
				                                icon="pencil-square-o" text="Editar">
				                            </ddi>
										@endif
									@else
										<li><a target="_blank" href="{{ route('service.corporation.printLetter', ['id' => $row->id]) }}">
											<i class="fa fa-print"></i>Carta resposiva
										</a></li>
										<ddi to="{{ route('service.editHour', ['id' => $row->id]) }}"
											icon="clock-o" text="Hora de regreso/Extras">
										</ddi>
										@if (auth()->user()->level == 1)
											<ddi to="{{ route('service.corporation.pay', ['id' => $row->id]) }}"
												icon="edit" text="Editar Pago">
											</ddi>
											<ddi to="{{ route('service.corporation.edit', ['id' => $row->id]) }}"
												icon="pencil-square-o" text="Editar">
											</ddi>
										@endif
									@endif
								</dropdown>
							</td>
							<td>{{ $row->description }}</td>
							<td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
							<td>
								{{ $row->origin }} - {{ $row->destination }}
								@if ($row->extra_driver == 5)
									<br> <span class="label label-danger">{{ $row->driver->nickname }}{{ $row->helper ? ' - ' . $row->helperr->nickname : '' }}</span>
								@elseif ($row->extra_driver > 10)
									<br> <span class="label label-warning">{{ $row->driver->nickname }}{{ $row->helper ? ' - ' . $row->helperr->nickname : '' }}</span>
								@endif
							</td>
							@if ($row->service == 'General')
								<td><a href="{{ route('client.details', ['id' => $row->client->id]) }}"> {{ $row->client->name }} </a></td>
							@else
								<td>{{ $row->service }}</td>
							@endif
							<td></td>
							<td>{{ $row->inventory }}</td>
							<td>
								{!! $row->statusLabel !!}
							</td>
							<td>{{ $row->pay }}</td>
							<td>{{ fnumber($row->total) }}</td>
						</tr>
						@php
							$sum += $row->total;
						@endphp
					@endforeach

				@foreach ($invoicesPayed as $row)
					<tr>
						<td>{{ $row->id }}</td>
						<td>
							<dropdown color="success" icon="cogs">
								<ddi to="{{ route('invoice.show', $row->id) }}"
									icon="eye" text="Detalles">
								</ddi>
							</dropdown>
						</td>
						<td>Factura</td>
						<td></td>
						<td></td>
						<td>
							@if ($row->client)
								<a href="{{ route('client.details', $row->client) }}">
									{{ $row->client->name }}
								</a>
							@else
								<a href="{{ route('insurer.details', $row->insurer) }}">
									{{ $row->insurer->name }}
								</a>
							@endif
						</td>
						<td>{{ $row->folio }}</td>
                        <td></td>
                        <td>{!! $row->statusLabel !!}</td>
                        <td>{{ $row->method }}</td>
                        <td>{{ fnumber($row->amount) }}</td>
					</tr>
					@php
					$sum += $row->amount;
					@endphp
				@endforeach

				@foreach ($payments as $row)
					<tr>
						<td>{{ $row->id }}</td>
						<td>
							<dropdown color="success" icon="cogs">
								<ddi to="{{ route('service.general.details', $row->service_id) }}"
									icon="eye" text="Detalles">
								</ddi>
								<ddi to="{{ route('service.general.payments', $row->service_id) }}"
									icon="indent" text="Historial Abonos">
								</ddi>
							</dropdown>
						</td>
						<td>Abono</td>
						<td>{{ $row->service->brand }} - {{ $row->service->type }} - {{ $row->service->color }}</td>
						<td>{{ $row->service->origin }} - {{ $row->service->destination }}</td>
						<td><a href="{{ route('client.details', ['id' => $row->service->client->id]) }}"> {{ $row->service->client->name }}</a></td>
						<td></td>
						<td>{{ $row->service->inventory }}</td>
						<td>
							{!! $row->service->statusLabel !!} <br>
							{{-- <a href="{{ route('service.general.payments', $row->service_id) }}">
								<i class="fa fa-indent"></i>
							</a> --}}
						</td>
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
