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
                        <b>{{ $range }}</b>
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
                    @foreach ($totalExtras as $driver => $extraHours)
                        @if ($extraHours)

                            {{ $driver}}
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
                                    <tr>
                                        @foreach ($extraHours as $row)
                                            <tr>
                                                <td>{{ $row->id }}</td>
                                                <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                                <td>{{ $row->origin }} - {{ $row->destination }}</td>
                                                <td>{{ $row->getShortDate('date_service') }} - {{ $row->getHour('date_return') }}</td>
                                                <td>
                                                    @if ($row->driverr->name == $driver && $row->extra_driver != null)
                                                        Operador $ {{ $row->extra_driver }}
                                                        @php
                                                            $total = $row->extra_driver + $total;
                                                        @endphp
                                                    @elseif ($row->helperr->name == $driver && $row->extra_helper != null)
                                                        Apoyo $ {{ $row->extra_helper }}
                                                        @php
                                                            $total = $row->extra_helper + $total;
                                                        @endphp
                                                    @else
                                                        Sin monto
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td><td></td><td></td>
                                        <td align="right"><b>Total</b></td>
                                        <td><b>$ {{ $total }}</b></td>
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
