<div class="row">
	<div class="col-md-12">
		<solid-box title="Servicios del {{ fdate($date, 'l d \d\e F, Y') }}" color="success">
			<div class="table-responsive">
				<table id="example1" class="table table-bordered table-striped table-hover table-condensed">
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
						@foreach ($services as $service)
							@if (fdate($service->date_service) != fdate($service->date_out))
								<tr>
									<td>{{ $service->id }}</td>
									<td>
										<dropdown color="success" icon="cogs">
											@if ($service->service == 'General')
												<ddi to="{{ route('service.general.details', $service) }}"
													icon="eye" text="Detalles">
												</ddi>
												<ddi to="{{ route('service.editHour', $service) }}"
													icon="clock-o" text="Hora de regreso/Extras">
												</ddi>
												@if ($service->status != 'pagado' && $service->status != 'cancelado' && $service->pay != 'Abonos')
													<ddi to="{{ route('service.general.pay', $service) }}"
														icon="dollar" text="Pagar sin factura">
													</ddi>
												@endif
												@if (auth()->user()->level == 1)
													<ddi to="{{ route('service.general.edit', $service) }}"
						                                icon="pencil-square-o" text="Editar">
						                            </ddi>
													<ddi to="{{ route('service.general.cancel', $service) }}"
														icon="times" text="Cancelar">
													</ddi>
												@endif
											@else
												<ddi to="{{ route('service.corporation.details', $service) }}"
													icon="eye" text="Detalles">
												</ddi>
												<ddi to="{{ route('service.editHour', $service) }}"
													icon="clock-o" text="Hora de regreso/Extras">
												</ddi>
												@if ($service->status == 'liberado')
													<ddi to="{{ route('service.corporation.printLetter', $service) }}"
					                                	icon="print" text="Imprimir">
					                            	</ddi>
												@else
													<ddi to="{{ route('service.corporation.pay', $service) }}"
														icon="hand-peace-o" text="Liberar">
													</ddi>
													@if (auth()->user()->level == 1)
														<ddi to="{{ route('service.corporation.edit', $service) }}"
															icon="pencil-square-o" text="Editar">
														</ddi>
														<ddi to="{{ route('service.corporation.cancel', $service) }}"
															icon="times" text="Cancelar">
														</ddi>
													@endif
												@endif
											@endif
										</dropdown>
									</td>
									<td>{{ $service->description }}</td>
									<td>
										{{ $service->brand }} {{ $service->type }}<br>
										{{ $service->color }}
									</td>
									<td>{{ $service->origin }}</td>
									<td>{{ $service->destination }}</td>
									<td style="text-align: center; font-family: monospace;">{{ $service->km }}</td>
									<td style="text-align: center">
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
									<td style="text-align: center">{{ $service->inventory }}</td>
									<td style="text-align: center">
										{!! $service->status == 'corralon' ? '<label class="label label-warning">PENDIENTE</label>' : $service->statusLabel !!}
										{{ $service->released_at != null ? fdate($service->released_at, ' (d/M/Y)', 'Y-m-d') : '' }}
										{{ $service->status == 'liquidado' ? fdate($service->date_out, ' (d/M/Y)') : '' }}
										{{ $service->status == 'pagado' && $service->bill == null ? fdate($service->date_out, ' (d/M/Y)') : '' }}
										{!! $service->status == 'pagado' && $service->bill != null ? fdate($service->invoice->date_pay, '(d/M/Y)', 'Y-m-d') . '<br>' . 'Fac ' . $service->invoice->folio : '' !!}
										{{ $service->status == 'abonos' ? ' resta ' . fnumber($service->debt) : '' }}
									</td>
									<td style="text-align: center">
										<a v-if="{{ $service->pay == 'Abonos' ? 1 : 0 }}" href="{{ route('service.general.payments', $service) }}">
											<i class="fa fa-indent"></i>
										</a>
										<div v-else>
											{{ $service->pay }}
										</div>
									</td>
									<td style="text-align: right;">
										@if ($service->total == 0 && $service->service == 'General')
											<a href="{{ route('service.general.editAmount', $service) }}"> <i style="color:#DCBF32" class="fa fa-warning"></i> </a>
										@else
											{{ number_format($service->total, 2) }}
										@endif
									</td>
								</tr>
								@php
									$sum += $service->total;
								@endphp
							@endif
						@endforeach

						@foreach ($insurerServ as $service)
							<tr>
	                        	<td>{{ $service->id }}</td>
								<td>
									<dropdown color="success" icon="cogs">
										<ddi to="{{ route('service.insurer.details', $service) }}"
											icon="eye" text="Detalles">
										</ddi>
										<ddi to="{{ route('service.insurer.editHour', $service) }}"
											icon="clock-o" text="Hora de regreso/Extras">
										</ddi>
										@if (auth()->user()->level == 1)
											<ddi to="{{ route('service.insurer.edit', $service) }}"
												icon="pencil-square-o" text="Editar">
											</ddi>
											<ddi to="{{ route('service.insurer.cancel', $service) }}"
												icon="times" text="Cancelar">
											</ddi>
										@endif
									</dropdown>
								</td>
								<td>{{ $service->description }}</td>
								<td>{{ $service->brand }} {{ $service->type }}<br>{{ $service->color }}</td>
								<td>{{ $service->origin }}</td>
								<td>{{ $service->destination }}</td>
								<td style="text-align: center;">{{ $service->km }}</td>
								<td style="text-align: center;">
									@if ($service->extra_driver == 5)
										<span class="label label-danger">{{ $service->driver->nickname }}{{ $service->helper ? ' - ' . $service->helperr->nickname : '' }}</span>
									@elseif ($service->extra_driver > 10)
										<span class="label label-warning">{{ $service->driver->nickname }}{{ $service->helper ? ' - ' . $service->helperr->nickname : '' }}</span>
									@endif
								</td>
		                        <td><a href="{{ route('insurer.details', $service->insurer) }}"> {{ $service->insurer->name }} </a></td>
								<td style="text-align: center;">{{ $service->folio }}</td>
								<td style="text-align: center;">{{ $service->inventory }}</td>
								<td style="text-align: center;">{!! $service->status == 'corralon' ? '<label class="label label-warning">PENDIENTE</label>' : $service->statusLabel !!}</td>
		                        <td></td>
		                        <td style="text-align: right;">
									@if ($service->total == 0)
										<a href="{{ route('service.insurer.editAmount', $service) }}"> <i style="color:#DCBF32" class="fa fa-warning"></i> </a>
									@else
										{{ number_format($service->total, 2) }}
									@endif
								</td>
	                    	</tr>
							@php
								$sum += $service->total;
							@endphp
						@endforeach
					</tbody>

					<tfoot>
						<tr>
							<td colspan="12"></td>
							<th><small>TOTAL</small></th>
							<td>{{ number_format($sum, 2) }} </td>
						</tr>
					</tfoot>
				</table>
			</div>
		</solid-box>

		{{-- <data-table-com title="Servicios del {{  fdate($date, 'd/M/Y', 'Y-m-d') }}" example="example3" color="success" button>
	        {{ drawHeader('ID', '<i class="fa fa-cogs"></i>', 'Descripción', 'Vehiculo', 'Ruta/operador', 'Servicio', 'Folio', 'Inv', 'Estatus', 'Método', 'Monto') }}
			<template slot="body">
				@php
					$sum = 0;
				@endphp
				@foreach ($services as $row)
					@if (fdate($row->date_service) != fdate($row->date_out))
						<tr>
							<td>{{ $row->id }}</td>
							<td>
								<dropdown color="success" icon="cogs">
									@if ($row->service == 'General')
										<ddi to="{{ route('service.general.details', ['id' => $row->id]) }}"
											icon="eye" text="Detalles">
										</ddi>
										<ddi to="{{ route('service.editHour', ['id' => $row->id]) }}"
											icon="clock-o" text="Hora de regreso/Extras">
										</ddi>
										@if ($row->status != 'pagado' && $row->status != 'cancelado' && $row->pay != 'Abonos')
											<ddi to="{{ route('service.general.pay', ['id' => $row->id]) }}"
												icon="dollar" text="Pagar sin factura">
											</ddi>
										@endif
										@if (auth()->user()->level == 1)
											<ddi to="{{ route('service.general.edit', ['id' => $row->id]) }}"
				                                icon="pencil-square-o" text="Editar">
				                            </ddi>
											<ddi to="{{ route('service.general.cancel', ['id' => $row->id]) }}"
												icon="times" text="Cancelar">
											</ddi>
										@endif
									@else
										<ddi to="{{ route('service.corporation.details', ['id' => $row->id]) }}"
											icon="eye" text="Detalles">
										</ddi>
										<ddi to="{{ route('service.editHour', ['id' => $row->id]) }}"
											icon="clock-o" text="Hora de regreso/Extras">
										</ddi>
										@if ($row->status == 'liberado')
											<ddi to="{{ route('service.corporation.printLetter', ['id' => $row->id]) }}"
				                                icon="print" text="Imprimir">
				                            </ddi>
										@else
											<ddi to="{{ route('service.corporation.pay', ['id' => $row->id]) }}"
												icon="hand-peace-o" text="Liberar">
											</ddi>
											@if (auth()->user()->level == 1)
												<ddi to="{{ route('service.corporation.edit', ['id' => $row->id]) }}"
													icon="pencil-square-o" text="Editar">
												</ddi>
												<ddi to="{{ route('service.corporation.cancel', ['id' => $row->id]) }}"
													icon="times" text="Cancelar">
												</ddi>
											@endif
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
								{!! $row->status == 'corralon' ? '<label class="label label-warning">PENDIENTE</label>' : $row->statusLabel !!}
								{{ $row->status == 'liberado' ? fdate($row->date_out, ' (d/M/Y)') : '' }}
								{{ $row->status == 'liquidado' ? fdate($row->date_out, ' (d/M/Y)') : '' }}
								{{ $row->status == 'pagado' && $row->bill == null ? fdate($row->date_out, ' (d/M/Y)') : '' }}
								{!! $row->status == 'pagado' && $row->bill != null ? fdate($row->invoice->date_pay, '(d/M/Y)', 'Y-m-d') . '<br>' . 'Fac ' . $row->invoice->folio : '' !!}
								{{ $row->status == 'abonos' ? ' resta ' . fnumber($row->debt) : '' }}
							</td>
							<td>
								<a v-if="{{ $row->pay == 'Abonos' ? 1 : 0 }}" href="{{ route('service.general.payments', $row) }}">
									<i class="fa fa-indent"></i>
								</a>
								<div v-else>
									{{ $row->pay }}
								</div>
							</td>
							<td>
								@if ($row->total == 0 && $row->service == 'General')
									<a href="{{ route('service.general.editAmount', ['id' => $row->id]) }}"> <i style="color:#DCBF32" class="fa fa-warning"></i> </a>
								@else
									{{ fnumber($row->total) }}
								@endif
							</td>
						</tr>
						@php
							$sum += $row->total;
						@endphp
					@endif
				@endforeach

				@foreach ($insurerServ as $row)
					<tr>
                        <td>{{ $row->id }}</td>
						<td>
							<dropdown color="success" icon="cogs">
								<ddi to="{{ route('service.insurer.details', ['id' => $row->id]) }}"
									icon="eye" text="Detalles">
								</ddi>
								<ddi to="{{ route('service.insurer.editHour', ['id' => $row->id]) }}"
									icon="clock-o" text="Hora de regreso/Extras">
								</ddi>
								@if (auth()->user()->level == 1)
									<ddi to="{{ route('service.insurer.edit', ['id' => $row->id]) }}"
										icon="pencil-square-o" text="Editar">
									</ddi>
									<ddi to="{{ route('service.insurer.cancel', ['id' => $row->id]) }}"
										icon="times" text="Cancelar">
									</ddi>
								@endif
							</dropdown>
						</td>
						<td>{{ $row->description }}</td>
						<td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
						<td>
							{{ $row->origin }} - {{ $row->destination }}  - {{ $row->km}} km
							@if ($row->extra_driver == 5)
								<br> <span class="label label-danger">{{ $row->driver->nickname }}{{ $row->helper ? ' - ' . $row->helperr->nickname : '' }}</span>
							@elseif ($row->extra_driver > 10)
								<br> <span class="label label-warning">{{ $row->driver->nickname }}{{ $row->helper ? ' - ' . $row->helperr->nickname : '' }}</span>
							@endif
						</td>
                        <td><a href="{{ route('insurer.details', ['id' => $row->insurer->id]) }}"> {{ $row->insurer->name }} </a></td>
						<td>{{ $row->folio }}</td>
						<td>{{ $row->inventory }}</td>
						<td>{!! $row->status == 'corralon' ? '<label class="label label-warning">PENDIENTE</label>' : $row->statusLabel !!}</td>
                        <td></td>
                        <td>
							@if ($row->total == 0)
								<a href="{{ route('service.insurer.editAmount', ['id' => $row->id]) }}"> <i style="color:#DCBF32" class="fa fa-warning"></i> </a>
							@else
								{{ fnumber($row->total) }}
							@endif
						</td>
                    </tr>
					@php
						$sum += $row->total;
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
	</div>
</div>
