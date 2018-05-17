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
            <div class="col-xs-3">
                <center>
                    <img width="150px" src="{{ asset('/img/MAPER.png') }}">
                </center>
            </div>
            <div class="col-xs-9">
                <h5 align="center">
                    <b>JOSE ALFREDO FIGUEROA ESPINOSA <br>
                    FIEA9004203X1</b><br>
                    4° AV Poniente Norte No. 11, Barrio Guadalupe <br>
                    Comitán de Domínguez, Chiapas <br>
                    Tel. (963) 2 07 05 Cel. (044) 963 103 64 77 <br>
                    Corralón: 5° Calle Norte Poniente No. 204, Barrio La Cueva
                </h5><br><br>
            </div>
        </div>
        <h5 align="right">
            Comitán de Domínguez, Chiapas a {{ fdate($service->date_out, 'd \d\e F \d\e\l Y') }} <br><br>
        </h5>

        <h5 align="left">
            <b>A QUIEN CORRESPONDA</b><br>
            <b>PRESENTE</b><br>
        </h5>
        <p>Con la presente, la empresa <b><u>Servicio de Grúas "MAPER"</u></b> hace de su conocimiento,
            que no se hace responsable por daño, robo o descontento (objetos personales, fallas mecánicas,
            golpes o cualquier otro tipo de problema) ante cualquier servicio de arrastre, maniobra y
            custodia de vehículos. Así mismo delega cualquier responsabilidad ya una vez liberado el vehículo.</p>
        <p>Esto no afectará en lo absoluto la calidad y eficacia en nuestro trabajo así como tampoco implica un descuido
            en la realización de nuestras labores y de sus intereses.</p>
        <p>Agradezco en forma insistente la comprensión y preferencia que ante todo tienen para con nuestros servicios.</p><br>
        <h5 align="center">
            <b>JOSE ALFREDO FIGUEROA ESPINOSA</b><br>
            <b>PROPIETARIO</b>
        </h5>

        Es por ello que: <br><br>
        <p>Yo <b>{{ $service->releaser }}</b>, en pleno uso de mis facultades, acepto los términos expuestos anteriormente y deslindo de
        cualquier responsabilidad de robo o falla mecánica a: <b><u>SERVICIO DE GRÚAS "MAPER"</u></b>, y recibo de conformidad la unidad:</p><br>

        <table align="center" border="1">
            <tr>
                <th width="90px"> &nbsp; MARCA:</th>
                <td width="250px"> &nbsp; {{ $service->brand }}</td>
            </tr>
            <tr>
                <th> &nbsp; TIPO:</th>
                <td> &nbsp; {{ $service->type }}</td>
            </tr>
            <tr>
                <th> &nbsp; COLOR:</th>
                <td> &nbsp; {{ $service->color }}</td>
            </tr>
            <tr>
                <th> &nbsp; MODELO:</th>
                <td> &nbsp; {{ $service->model }}</td>
            </tr>
            <tr>
                <th> &nbsp; PLACAS:</th>
                <td> &nbsp; {{ $service->plate }}</td>
            </tr>
        </table><br>
        <body align="center">
            El día {{ fdate($service->date_out, 'd \d\e F \d\e\l \a\ñ\o Y') }} y hago constar que
            el importe total pagado por la liberación del vehículo es la cantidad de:
            <h4>
                <b>{{ fnumber($service->total) }}</b>
            </h4>
        </body><br><br><br><br>

        <h5 align="center">
            _____________________________________<br><br>
            NOMBRE Y FIRMA
        </h5>
    </section>
</div>
<!-- ./wrapper -->
</body>
</html>
