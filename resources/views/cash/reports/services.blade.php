<div class="row">
	<div class="col-xs-12">
		<table class="table">
			<thead>
				<tr>
					<th>Inv</th>
					<th>Folio</th>
					<th>Servicio</th>
					<th>Descripción</th>
					<th>Vehiculo</th>
					<th>Estatus</th>
					<th>Método</th>
					<th>Monto</th>
				</tr>
			</thead>
			<body>
				@php
					$sum = 0;
				@endphp
				@foreach ($services as $row)
					@if (fdate($row->date_service) != fdate($row->date_out))
						<tr>
							<td>{{ $row->inventory }}</td>
							<td></td>
							@if ($row->service == 'General')
								<td>{{ $row->client->name }}</td>
							@else
								<td>{{ $row->service }}</td>
							@endif
							<td>{{ $row->description }}</td>
							<td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
							<td>
								{{ $row->status == 'corralon' ? 'pendiente' : $row->status }}
								{{ $row->status == 'liberado' ? fdate($row->date_out, ' (d/M/Y)') : '' }}
								{{ $row->status == 'liquidado' ? fdate($row->date_credit, ' (d/M/Y)') : '' }}
								{{ $row->status == 'pagado' ? fdate($row->date_out, ' (d/M/Y)') : '' }}
							</td>
							<td>{{ $row->pay == 'credito' ? $row->pay_credit : $row->pay }}</td>
							<td>{{ fnumber($row->total) }}</td>
						</tr>
						@php
							$sum += $row->total;
						@endphp
					@endif
				@endforeach

				@foreach ($insurerServ as $row)
					<tr>
						<td>{{ $row->inventory }}</td>
						<td>{{ $row->folio }}</td>
                        <td>{{ $row->insurer->name }}</td>
						<td>{{ $row->description }}</td>
                        <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
						<td>{{ $row->status }}</td>
                        <td></td>
                        <td>{{ fnumber($row->total) }}</td>
                    </tr>
					@php
						$sum += $row->total;
					@endphp
				@endforeach
			</body>
			<tfooter>
				<tr>
					<td colspan="6"></td>
					<td><b>Total:</b></td>
					<td>{{ fnumber($sum) }} </td>
				</tr>
			</tfooter>
	    </table>
	</div>
</div>
