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
</div>