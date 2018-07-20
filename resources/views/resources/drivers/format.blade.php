<html>
<head>
    <meta charset="UTF-8">
    <title>MAPER</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />

    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('/plugins/iCheck/all.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/plugins/dataTables.bootstrap.css') }}">

    <style>
        th, td {
            font-size: 11px;
        },
    </style>
</head>

<body >
    <div class="wrapper">
        <section class="invoice">
            <div class="row">
                <div class="col-xs-3">
                    <center>
                        <img width="100px" src="{{ asset('/img/MAPER.png') }}">
                    </center>
                </div>
                <div class="col-xs-6">
                    <h4 align="center">
                        <b>Horas Extras</b><br>
                    </h4>
                    <h5 align="center">
                        <b>{{ fdate($start, 'D, d/M/Y', 'Y-m-d') . ' - ' . fdate($end, 'D, d/M/Y', 'Y-m-d') }}</b>
                    </h5><br><br>
                </div>
                <div class="col-xs-3">
                    <center>
                        <img width="100px" src="{{ asset('/img/MAPER.png') }}">
                    </center>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    @foreach ($drivers as $driver)
                        @if($totalExtras[$driver->id])
                            {{ $driver->name }}
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="29%">Vehiculo</th>
                                        <th width="29%">Ruta</th>
                                        <th width="23%">Fecha</th>
                                        <th width="14%">Monto</th>
                                    </tr>
                                </thead>
                                @php
                                    $total = 0;
                                @endphp
                                <tbody>
                                    @foreach ($totalExtras[$driver->id] as $service)
                                        <tr>
                                            <td>{{ $service->id }}</td>
                                            <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                                            <td>{{ $service->origin }} - {{ $service->destination }}</td>
                                            <td>{{ fdate($service->date_service, 'j/M/y, h:i a') }} - {{ fdate($service->date_service, 'j/M/y, h:i a') }}</td>
                                            <td>
                                                @if ($service->driver->name == $driver->name && $service->extra_driver != null)
                                                    Operador $ {{ $service->extra_driver }}
                                                    @php
                                                        $total = $service->extra_driver + $total;
                                                    @endphp
                                                @elseif ($service->helper)
                                                    @if ($service->helperr->name == $driver->name && $service->extra_helper != null)
                                                        Apoyo $ {{ $service->extra_helper }}
                                                        @php
                                                            $total = $service->extra_helper + $total;
                                                        @endphp
                                                    @endif
                                                @else
                                                    Sin monto
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach($discounts->where('driver_id', $driver->id) as $discount)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><em>Descuento</em><br>{{ $discount->reason }}</td>
                                            <td>{{ fdate($discount->discounted_at, 'j/M/y', 'Y-m-d') }}</td>
                                            <td>&ndash; {{ fnumber($discount->amount) }}</td>
                                            @php
                                                $total -= $discount->amount;
                                            @endphp
                                        </tr>
                                    @endforeach
                                    @if(fdate($start, 'D', 'Y-m-d') == 'sáb')
                                        <tr>
                                            <td colspan="2"></td>
                                            <td><em>Sueldo</em></td>
                                            <td>{{ fdate($start, 'j/M/y', 'Y-m-d') }}</td>
                                            <td>{{ fnumber($driver->base_salary) }}</td>
                                            @php
                                                $total += $driver->base_salary;
                                            @endphp
                                        </tr>
                                    @endif
                                    @php
                                        $startt = $start;
                                    @endphp
                                    @for($i = 1; $i < $pay_days; $i++)
                                        @php
                                            $nextSat = strtotime("next saturday", strtotime($startt));
                                            $startt = date('Y-m-d', $nextSat);
                                        @endphp
                                        @if($nextSat <= strtotime($end))
                                            <tr>
                                                <td colspan="2"></td>
                                                <td><em>Sueldo</em></td>
                                                <td>{{ fdate(date('Y-m-d', $nextSat), 'j/M/y', 'Y-m-d') }}</td>
                                                <td>{{ fnumber($driver->base_salary) }}</td>
                                                @php
                                                    $total += $driver->base_salary;
                                                @endphp
                                            </tr>
                                        @endif
                                    @endfor
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td align="right"><b>Total</b></td>
                                        <td><b>{{ fnumber($total) }}</b></td>
                                    </tr>
                                </tfoot>
                            </table>
                        @endif
                    @endforeach
                </div>
            <!-- /.col -->
            </div>

        </section>
    </div>
<!-- ./wrapper -->
</body>
</html>
