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
        p {
            text-align:justify;
            text-indent:50px;
        },
        th {
            font-weight: 10;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <section class="invoice">
            <div class="row">
                <div class="col-xs-3">
                    <center>
                        <img width="100px" src="{{ asset('/img/MAPER.png') }}">
                    </center>
                </div>
                <div class="col-xs-9">
                    <h3 align="center">
                        <b>Gastos</b><br>
                    </h3>
                    <h4 align="center">
                        <b>{{ $range }}</b>
                    </h4><br><br>
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
                                <th>Monto</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($all as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->date }}</td>
                                    <td>{{ $row->description }} {{ $row->bill == 'si' ? '- Facturado' : '' }}</td>
                                    <td>${{ $row->amount }}</td>
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
