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
        body {
            text-align:center;
            text-indent:50px;
        },
        td {
            height: 10px;
        }
    </style>
</head>

<body onload="window.print();">
<div class="wrapper">
    <section class="invoice">
        <div class="row">
            <center>
                <img width="150px" src="{{ asset('/img/MAPER.png') }}">
            </center>
        </div>
        <div class="row">
            <h5 align="center">
                <b>JOSE ALFREDO FIGUEROA ESPINOSA <br>
                FIEA9004203X1</b><br>
                4° AV Poniente Norte No. 11, Barrio Guadalupe <br>
                Comitán de Domínguez, Chiapas <br>
                Tel. (963) 2 07 05 Cel. (044) 963 103 64 77 <br>
                Corralón: 5° Calle Norte Poniente No. 204, <br>
                Barrio La Cueva
            </h5>
        </div>
        <div>
            <big><b>LIBERADO</b></big>
            <span class="pull-right">
                <big><b>FOLIO: {{ $service->folio }}</b></big>
            </span>
        </div>

        <h5 align="right">
            {{ fdate($service->date_out, 'd \d\e F \d\e\l Y') }} <br><br>
        </h5>

        <h5 align="left">
            <b>GRUAS MAPER HACE ENTREGA DEL VEHICULO:</b><br>
        </h5>

        <h5><b>MARCA: </b>{{ $service->brand }} <span class="pull-right"><b>TIPO: </b>{{ $service->type }}</span></h5>
        <h5><b>MODELO: </b>{{ $service->model }} <span class="pull-right"><b>PLACAS: </b>{{ $service->plate }}</span></h5>
        <h5><b>COLOR: </b>{{ $service->color }}</h5>
        <h5><b>AL SR. (A): </b>{{ $service->releaser }}</h5>
        <hr><hr>
    </section>
</div>
</body>
</html>
