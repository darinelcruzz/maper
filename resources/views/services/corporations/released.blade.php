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
                            <th>Total <br> Pagado </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($releaseds as $released)
                            <tr>
                                <td>{{ fdate($released->date_service, 'd-M-y') }}</td>
                                <td>{{ fdate($released->date_out, 'd-M-y') }}</td>
                                <td>{{ $released->folio }}</td>
                                <td>{{ $released->inventory }}</td>
                                <td>{{ $released->brand . ' ' . $released->type }}</td>
                                <td>{{ fnumber($released->amount) }}</td>
                                <td>{{ fnumber($released->maneuver) }}</td>
                                <td>{{ $released->getDays('date_service', 'date_out') }}</td>
                                <td>{{ $released->pension/$released->getDays('date_service', 'date_out') }}</td>
                                <td>{{ fnumber($released->pension) }}</td>
                                <td>{{ fnumber($released->total + $released->discount) }}</td>
                                <td>{{ fnumber($released->total) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
	</section>
</body>
</html>
