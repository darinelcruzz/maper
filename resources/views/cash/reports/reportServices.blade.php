<html>
<head>
    <meta charset="UTF-8">
    <title>MAPER</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/img/MAPER.ico') }}" />
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/plugins/dataTables.bootstrap.css') }}">

    <style>
        th, td {
            font-size: 11px;
        },

        html, body { overflow: hidden; }
    </style>
</head>

<body onload="window.print()">
    <section class="invoice">
		<div class="row">
            <div class="col-xs-3">
                <center>
                    <img width="80px" src="{{ asset('/img/MAPER.png') }}">
                </center>
            </div>
            <div class="col-xs-6">
                <h4 align="center">
                    <b>Reporte de servicios</b><br>
                </h4>
                <h5 align="center">
                    <b>{{ $fdate }}</b>
                </h5>
            </div>
        </div>
        <div class="row">
            <h5 align="center">Crédito</h5>
        	<div class="col-xs-12">
        		<table class="table">
        			<thead>
        				<tr>
        					<th>ID</th>
        					<th>Inv</th>
        					<th>Servicio</th>
        					<th>Fecha Serv</th>
        					<th>Vehiculo</th>
                            <th>Extras</th>
        					<th>Monto</th>
        				</tr>
        			</thead>
        			<body>
        				@php
        					$sum = 0;
        				@endphp

        				@foreach ($services as $row)
        					<tr>
        						<td>{{ $row->id }}</td>
        						<td>{{ $row->inventory }}</td>
        						@if ($row->service == 'General')
        							<td>{{ $row->client->name }}</td>
        						@else
        							<td>{{ $row->service }}</td>
        						@endif
        						<td>{{ fdate($row->date_service, 'D, d-M-y') }}</td>
        						<td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>
                                    @if ($row->extra_driver > 0)
                                        <i class="fas fa-check"></i>
                                    @endif
                                </td>
        						<td>{{ fnumber($row->total) }}</td>
        					</tr>
        					@php
        						$sum += $row->total;
        					@endphp
        				@endforeach

        				@foreach ($insurerServices as $row)
        					<tr>
        						<td>{{ $row->id }}</td>
        						<td>{{ $row->inventory }}</td>
        						<td>{{ $row->insurer->name }}</td>
        						<td>{{ fdate($row->date_assignment, 'D, d-M-y') }}</td>
        						<td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>
                                    @if ($row->extra_driver > 0)
                                        <i class="fas fa-check"></i>
                                    @endif
                                </td>
        						<td>{{ fnumber($row->total) }}</td>
        					</tr>
        					@php
        						$sum += $row->total;
        					@endphp
        				@endforeach
        			</body>
        			<tfooter>
        				<tr>
        					<td colspan="5"></td>
        					<td><b>Total:</b></td>
        					<td><b>{{ fnumber($sum) }}</b></td>
        				</tr>
        			</tfooter>
        		</table>
        	</div>
        </div>
        <div class="row">
            <h5 align="center">Ingresos</h5>
        	<div class="col-xs-12">
        		<table class="table">
        			<thead>
        				<tr>
        					<th>ID</th>
        					<th>Inv</th>
        					<th>Servicio</th>
        					<th>Fecha Serv</th>
        					<th>Fecha Pago</th>
        					<th>Vehiculo</th>
                            <th>Extras</th>
                            <th>Método</th>
        					<th>Monto</th>
        				</tr>
        			</thead>
        			<body>
        				@php
        					$sum = 0;
        				@endphp

        				@foreach ($services2 as $row)
        					<tr>
        						<td>{{ $row->id }}</td>
        						<td>{{ $row->inventory }}</td>
        						@if ($row->service == 'General')
        							<td>{{ $row->client->name }}</td>
        						@else
        							<td>{{ $row->service }}</td>
        						@endif
        						<td>{{ fdate($row->date_service, 'D, d-M-y') }}</td>
                                <td>{{ fdate($row->date_out, 'D, d-M-y') }}</td>
        						<td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>
                                    @if ($row->extra_driver > 0)
                                        <i class="fas fa-check"></i>
                                    @endif
                                </td>
                                <td>{{ $row->pay }}</td>
        						<td>{{ fnumber($row->total) }}</td>
        					</tr>
        					@php
        						$sum += $row->total;
        					@endphp
        				@endforeach
        				@foreach ($insurerServices2 as $row)
        					<tr>
        						<td>{{ $row->id }}</td>
        						<td>{{ $row->inventory }}</td>
        						<td>{{ $row->insurer->name }}</td>
        						<td>{{ fdate($row->date_assignment, 'D, d-M-y') }}</td>
        						<td>{{ fdate($row->date_pay, 'D, d-M-y') }}</td>
        						<td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                <td>
                                    @if ($row->extra_driver > 0)
                                        <i class="fas fa-check"></i>
                                    @endif
                                </td>
                                <td>{{ $row->pay }}</td>
        						<td>{{ fnumber($row->total) }}</td>
        					</tr>
        					@php
        						$sum += $row->total;
        					@endphp
        				@endforeach
        				@foreach ($invoices as $row)
        					<tr>
        						<td>{{ $row->id }}</td>
        						<td>Fac {{ $row->folio }}</td>
        						<td>
                                    @if ($row->insurer_id)
                                        {{ $row->insurer->name }}
                                    @else
                                        {{ $row->client->name }}
                                    @endif
                                </td>
        						<td></td>
                                <td>{{ fdate($row->date, 'D, d-M-y', 'Y-m-d') }}</td>
                                <td></td>
                                <td></td>
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
        						<td>Ser {{ $row->service->id }}</td>
        						<td>
                                    @if ($row->service->service == 'General')
            							{{ $row->service->client->name }}
            						@else
            							{{ $row->service->service }}
            						@endif
                                </td>
                                <td></td>
        						<td>{{ fdate($row->created_at, 'D, d-M-y') }}</td>
        						<td>{{ $row->service->brand }} - {{ $row->service->type }} - {{ $row->service->color }}</td>
                                <td></td>
                                <td>{{ $row->method }}</td>
        						<td>{{ fnumber($row->amount) }}</td>
        					</tr>
        					@php
        						$sum += $row->amount;
        					@endphp
        				@endforeach
        			</body>
        			<tfooter>
        				<tr>
        					<td colspan="7"></td>
        					<td><b>Total:</b></td>
        					<td><b>{{ fnumber($sum) }}</b></td>
        				</tr>
        			</tfooter>
        		</table>
        	</div>
        </div>


	</section>
</body>
</html>
