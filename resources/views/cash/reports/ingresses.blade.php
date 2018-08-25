<div class="row">
	<div class="col-xs-12">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Inv</th>
					<th>Folio</th>
					<th>Servicio</th>
					<th>Fecha</th>
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

				@foreach ($payed as $row)
					<tr>
						<td>{{ $row->id . 'S' }}</td>
						<td>{{ $row->inventory }}</td>
						<td></td>
						@if ($row->service == 'General')
							<td>{{ $row->client->name }}</td>
						@else
							<td>{{ $row->service }}</td>
						@endif
						<td>{{ fdate($row->date_service, 'd-m-Y') }}</td>
						<td>{{ $row->description }}</td>
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
						<td>{{ $row->id . 'S' }}</td>
						<td>{{ $row->inventory }}</td>
						<td></td>
						<td>{{ $row->client->name }}</td>
						<td>{{ fdate($row->date_service, 'd-m-Y') }}</td>
						<td>{{ $row->description }}</td>
						<td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
						<td>{{ $row->status == 'corralon' ? 'pendiente' : $row->status }}</td>
						<td>{{ $row->pay_credit ? $row->pay_credit : $row->pay }}</td>
						<td>{{ fnumber($row->total) }}</td>
					</tr>
					@php
						$sum += $row->total;
					@endphp
				@endforeach

			</body>
			<tfooter>
				<tr>
					<td colspan="8"></td>
					<td><b>Total:</b></td>
					<td><b>{{ fnumber($sum) }}</b></td>
				</tr>
			</tfooter>
		</table>
	</div>
</div>
