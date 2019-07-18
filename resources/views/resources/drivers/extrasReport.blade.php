
<html>
<head>
    <meta charset="UTF-8">
    <title>MAPER|Extras</title>
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
                <h2 style="border: ridge #ff0000 1px;" align="center">
                    <b>Extras</b><br>
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
                            <th width="5%">#</th>
                            <th width="14%">Tipo</th>
                            <th width="18%">Vehiculo</th>
                            <th width="25%">Ruta</th>
                            <th width="20%">Fechas</th>
                            <th width="18%">Operador/Apoyo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->service }}</td>
                                <td>{{ $row->brand }} <br> {{ $row->type }} <br> {{ $row->color }}</td>
                                <td><b>O:</b>{{ $row->origin }} <br><b>D:</b> {{ $row->destination }}</td>
                                <td><b>S:</b>{{ fdate($row->date_service, ' j/M/y H:i') }} <br><b>R:</b> {{ fdate($row->date_return, ' j/M/y H:i') }}</td>
                                <td>
                                    <b>O:</b> {{ $row->driver->nickname }}: {{ fnumber($row->extra_driver) }} <br>
                                    <b>A:</b> {{ $row->helperr->nickname or '' }} {{ $row->extra_helper ?  fnumber($row->extra_helper, 2): '' }}
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($insurerServices as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>Aseguradora</td>
                                <td>{{ $row->brand }} <br> {{ $row->type }} <br> {{ $row->color }}</td>
                                <td><b>O:</b>{{ $row->origin }} <br><b>D:</b> {{ $row->destination }}</td>
                                <td><b>S:</b>{{ fdate($row->date_assignment, ' j/M/y H:i') }} <br><b>R:</b> {{ fdate($row->date_return, ' j/M/y H:i') }}</td>
                                <td>
                                    <b>O:</b> {{ $row->driver->nickname }}: {{ fnumber($row->extra_driver) }} <br>
                                    <b>A:</b> {{ $row->helperr->nickname or '' }} {{ $row->extra_helper ?  fnumber($row->extra_helper, 2): '' }}
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($extras as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                @if ($row->service_id > 0)
                                    <td>Extra servicio</td>
                                    <td>{{ $row->service->brand }} <br> {{ $row->service->type }} <br> {{ $row->service->color }}</td>
                                    <td><b>O:</b>{{ $row->service->origin }} <br><b>D:</b> {{ $row->service->destination }}</td>
                                    <td><b>S:</b>{{ fdate($row->service->date_service, ' j/M/y H:i') }} <br><b>R:</b> {{ fdate($row->service->date_return, ' j/M/y H:i') }}</td>
                                @endif
                                @if ($row->insurer_service_id > 0)
                                    <td>Extra Aseguradora</td>
                                    <td>{{ $row->insurerService->brand }} <br> {{ $row->insurerService->type }} <br> {{ $row->insurerService->color }}</td>
                                    <td><b>O:</b>{{ $row->insurerService->origin }} <br><b>D:</b> {{ $row->insurerService->destination }}</td>
                                    <td><b>S:</b>{{ fdate($row->insurerService->date_assignment, ' j/M/y H:i') }} <br><b>R:</b> {{ fdate($row->insurerService->date_return, ' j/M/y H:i') }}</td>
                                @endif
                                    <td>
                                        @if ($row->type == 1)
                                            <b>O:</b>{{ $row->driver->nickname }}: {{ fnumber($row->extra) }} <br>
                                        @endif
                                        @if ($row->type == 0)
                                            <b>A:</b>{{ $row->driver->nickname }}: {{ fnumber($row->extra) }}
                                        @endif
                                    </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h3 align="center">Total = {{ fnumber($services->sum('extra_driver') + $services->sum('extra_helper') + $insurerServices->sum('extra_driver') + $insurerServices->sum('extra_helper') + $extras->sum('extra')) }}</h3>
            </div>
        </div>
    </section>
</body>
