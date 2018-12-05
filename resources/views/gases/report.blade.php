<html>
<head>
    <meta charset="UTF-8">
    <title>MAPER</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                    <img width="100px" src="{{ asset('/img/MAPER.png') }}">
                </center>
            </div>
            <div class="col-xs-6">
                <h2 align="center">
                    <b>Gasolina</b><br>
                </h2>
            </div>
        </div>

        @foreach($pendings as $type=>$rows)
            <h4>{{ $type }}</h4>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Fecha</th>
                                <th>Producto</th>
                                <th>Observaciones</th>
                                <th>Monto</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($rows as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ fdate($row->date, 'd/M/y', 'Y-m-d') }}</td>
                                    <td>{{ $row->product }}</td>
                                    <td>{{ $row->observations }}</td>
                                    <td>{{ fnumber($row->total) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3"></td>
                                <th>Total</th>
                                <td><b>{{ fnumber($rows->sum('total')) }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </section>
</body>
</html>
