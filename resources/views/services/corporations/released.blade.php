<html>
<head>
    <meta charset="UTF-8">
    <title>MAPER</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('/img/MAPER.ico') }}" />
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/dataTables.bootstrap.css') }}">

    <style>
        th, td {
            text-align: center;
            font-size: 11px;
        },
        html, body {
            overflow: hidden;
        }
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
                <h2 style="border: ridge #ff0000 1px;" align="center">
                    <b>Reporte Liberados</b><br>
                </h2>
                <h5 align="center">
                    <b>{{ fdate(date('Y-m-d'), 'D, d \d\e F Y', 'Y-m-d') }}</b>
                </h5>
            </div>
            <div class="col-xs-3">
                <center>
                    <img width="80px" src="{{ asset('/img/MAPER.png') }}">
                </center>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Fecha <br> ingreso</th>
                            <th>Fecha <br> liberación</th>
                            <th>Folio</th>
                            <th>Inv</th>
                            <th>Vehiculo</th>
                            <th>Arrartre</th>
                            <th>Maniobra</th>
                            <th>Dias <br> pensión </th>
                            <th>Costo <br> diario </th>
                            <th>Total <br> pensión </th>
                            <th>Total</th>
                            <th>Descuento</th>
                            <th>Total <br> Pagado </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($released as $service)
                            <tr>
                                <td>{{ fdate($service->date_service, 'd-M-y') }}</td>
                                <td>{{ fdate($service->date_out, 'd-M-y') }}</td>
                                <td>{{ $service->folio }}</td>
                                <td>{{ $service->inventory }}</td>
                                <td>{{ $service->brand . ' ' . $service->type }}</td>
                                <td>{{ fnumber($service->amount) }}</td>
                                <td>{{ fnumber($service->maneuver) }}</td>
                                <td>{{ $service->getDays('date_service', 'date_out') }}</td>
                                <td>{{ $service->pension/$service->getDays('date_service', 'date_out') }}</td>
                                <td>{{ fnumber($service->pension) }}</td>
                                <td>{{ fnumber($service->total + $service->discount) }}</td>
                                <td>{{ fnumber($service->discount) }} <br> {{ $service->reason }}</td>
                                <td>{{ fnumber($service->total) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
	</section>
</body>
</html>
