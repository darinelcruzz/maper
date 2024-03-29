<div class="row">
	<div class="col-md-12">
		<solid-box title="Ingresos del {{ fdate($date) }}" color="success">
			<div class="table-responsive">
				<table id="example2" class="table table-bordered table-striped table-hover table-condensed">
					<thead>
						<tr>
							<th style="width: 3%"><small>ID</small></th>
							<th style="width: 3%"><i class="fa fa-cogs"></i></th>
							<th style="width: 8%"><small>DESCRIPCIÓN</small></th>
							<th style="width: 15%"><small>VEHÍCULO</small></th>
							<th style="width: 15%"><small>ORIGEN</small></th>
							<th style="width: 13%"><small>DESTINO</small></th>
							<th style="width: 3%; text-align: center"><small>KM</small></th>
							<th style="width: 5%; text-align: center"><small>OPERADOR</small></th>
							<th style="width: 12%"><small>SERVICIO</small></th>
							<th style="width: 5%; text-align: center"><small>FOLIO</small></th>
							<th style="width: 5%; text-align: center"><small>INV</small></th>
							<th style="width: 5%; text-align: center"><small>ESTADO</small></th>
							<th style="width: 5%; text-align: center"><small>MÉTODO</small></th>
							<th style="width: 10%; text-align: right;"><small>IMPORTE</small></th>
						</tr>
					</thead>

					<tbody>
						@php
							$sum = 0;
						@endphp

						@foreach ($payed as $service)
							<tr>
								<td>
									<a href="{{ route($service->service == 'General' ? 'service.general.details' : 'service.corporation.details', $service) }}">
										{{ $service->id }}
									</a>
								</td>
								<td>
									<dropdown color="success" icon="cogs">
										@if ($service->service == 'General')
											<ddi to="{{ route('service.editHour', $service) }}"
												icon="clock-o" text="Hora de regreso/Extras">
											</ddi>
											@if (auth()->user()->level == 1)
												<ddi to="{{ route('service.general.pay', $service) }}"
													icon="edit" text="Editar Pago">
												</ddi>
												<ddi to="{{ route('service.general.edit', $service) }}"
					                                icon="pencil-square-o" text="Editar">
					                            </ddi>
											@endif
										@else
											<li><a target="_blank" href="{{ route('service.corporation.printLetter', $service) }}">
												<i class="fa fa-print"></i>Carta resposiva
											</a></li>
											<ddi to="{{ route('service.editHour', $service) }}"
												icon="clock-o" text="Hora de regreso/Extras">
											</ddi>
											@if (auth()->user()->level == 1)
												<ddi to="{{ route('service.corporation.pay', $service) }}"
													icon="edit" text="Editar Pago">
												</ddi>
												<ddi to="{{ route('service.corporation.edit', $service) }}"
													icon="pencil-square-o" text="Editar">
												</ddi>
											@endif
										@endif
									</dropdown>
								</td>
								<td>
									@if (fdate($service->date_service) == fdate($service->date_out))
										{{ $service->description }}
									@else
										PAGO <br>Serv: {{ fdate($service->date_service) }}
									@endif
								</td>
								<td>{{ $service->brand }} {{ $service->type }}<br>{{ $service->color }}</td>
								<td>{{ $service->origin }}</td>
								<td>{{ $service->destination }}</td>
								<td style="text-align: center; font-family:monospace;">{{ $service->km }}</td>
								<td style="text-align: center;">
									@if($service->extra_driver)
										<span class="label label-{{ $service->extra_driver == 5 ? 'danger': 'warning'}}">{{ $service->driver->nickname }}</span>
									@endif
									@if($service->extra_helper)
										<br>
										<span class="label label-default">{{ $service->helperr->nickname ?? '' }}</span>
									@endif
								</td>
								@if ($service->service == 'General')
									<td><a href="{{ route('client.details', $service->client) }}"> {{ $service->client->name }} </a></td>
								@else
									<td>{{ $service->service }}</td>
								@endif
								<td></td>
								<td style="text-align: center;">{{ $service->inventory }}</td>
								<td style="text-align: center;">
									{!! $service->statusLabel !!}
								</td>
								<td style="text-align: center;">{{ $service->pay }}</td>
								<td style="text-align: right;">{{ number_format($service->total, 2) }}</td>
							</tr>
							@php
								$sum += $service->total;
							@endphp
						@endforeach

						@foreach($invoicesPayed as $payment)
							<tr>
								<td>{{ $payment->id }}</td>
								<td>
									<dropdown color="success" icon="cogs">
										<ddi to="{{ route('invoice.show', $payment->id) }}"
											icon="eye" text="Detalles">
										</ddi>
										@if (auth()->user()->level == 1)
											<ddi to="{{ route('invoice.edit', $payment->id) }}"
												icon="edit" text="Editar">
											</ddi>
										@endif
									</dropdown>
								</td>
								<td><small>FACTURA</small></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									@if ($payment->client)
										<a href="{{ route('client.details', $payment->client) }}">
											{{ $payment->client->name }}
										</a>
									@else
										<a href="{{ route('insurer.details', $payment->insurer) }}">
											{{ $payment->insurer->name }}
										</a>
									@endif
								</td>
								<td style="text-align: center;">{{ $payment->folio }}</td>
		                        <td></td>
		                        <td style="text-align: center;">{!! $payment->statusLabel !!}</td>
		                        <td style="text-align: center;">{{ $payment->method }}</td>
		                        <td style="text-align: right;">{{ fnumber($payment->amount) }}</td>
							</tr>
							@php
							$sum += $payment->amount;
							@endphp
						@endforeach

						@foreach ($payments as $payment)
							<tr>
								<td>{{ $payment->id }}</td>
								<td>
									<dropdown color="success" icon="cogs">
										<ddi to="{{ route('service.general.details', $payment->service_id) }}"
											icon="eye" text="Detalles">
										</ddi>
										<ddi to="{{ route('service.general.payments', $payment->service_id) }}"
											icon="indent" text="Historial Abonos">
										</ddi>
									</dropdown>
								</td>
								<td><small>ABONO</small></td>
								<td>{{ $payment->service->brand }} {{ $payment->service->type }}<br>{{ $payment->service->color }}</td>
								<td>{{ $payment->service->origin }}</td>
								<td>{{ $payment->service->destination }}</td>
								<td style="text-align: center;">{{ $payment->service->km }}</td>
								<td></td>
								<td>
									<a href="{{ route('client.details', $payment->service->client->id) }}">
										{{ $payment->service->client->name }}
									</a>
								</td>
								<td></td>
								<td style="text-align: center;">{{ $payment->service->inventory }}</td>
								<td style="text-align: center;">{!! $payment->service->statusLabel !!}</td>
		                        <td style="text-align: center;">{{ $payment->method }}</td>
		                        <td style="text-align: right;">{{ number_format($payment->amount, 2) }}</td>
							</tr>
							@php
							$sum += $payment->amount;
							@endphp
						@endforeach

					</tbody>

					<tfoot>
						<tr>
							<td colspan="12"></td>
							<th><small>TOTAL</small></th>
							<td style="text-align: right;">{{ number_format($sum, 2) }} </td>
						</tr>
					</tfoot>
				</table>
			</div>
		</solid-box>
	</div>
</div>

		{{-- <data-table-com title="Ingresos del {{ fdate($date, 'd/M/Y', 'Y-m-d') }}" example="example2" color="success" button>
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
								{{ $row->origin }} - {{ $row->destination }} - {{ $row->km}} km
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
								@if (auth()->user()->level == 1)
									<ddi to="{{ route('invoice.edit', $row->id) }}"
										icon="edit" text="Editar">
									</ddi>
								@endif
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
							</a>
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
		</data-table-com> --}}


	{{-- </div>
</div> --}}
