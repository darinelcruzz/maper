<div class="row">
	<div class="col-md-12">
		<data-table-com title="Servicios del {{  fdate($date, 'd/M/Y', 'Y-m-d') }}" example="example1" color="success" button>
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
	    </data-table-com>
	</div>
</div>
