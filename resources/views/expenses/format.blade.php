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

<body onload="window.print()">
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
                        <b>Gastos</b><br>
                    </h4>
                    <h5 align="center">
                        <b>{{ $range }}</b>
                    </h5><br><br>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Descripción</th>
                                <th>Cargo</th>
                                <th>Abono</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $temp = 0;
                            @endphp
                            @foreach($expenses as $row)
                                @php
                                    if (!$row->isCharge) {
                                        $temp += $row->amount;
                                    } else {
                                        $temp -= $row->amount;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->getDate('date') }}</td>
                                    <td>{{ $row->isBilled ? "$row->description - Facturado" : $row->description }}</td>
                                    <td>{{ $row->isCharge ? $row->famount : '' }}</td>
                                    <td>{{ $row->isCharge ? '' : $row->famount }}</td>
                                    <td>{{ '$ ' . number_format($temp, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <!-- /.col -->
            </div>

        </section>
    </div>
<!-- ./wrapper -->
</body>
</html>
