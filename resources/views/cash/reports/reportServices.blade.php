<html>
<head>
    <meta charset="UTF-8">
    <title>MAPER</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('/css/all.css') }}" rel="stylesheet" type="text/css" />

    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
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
                <h4 align="center">
                    <b>Reporte de servicios</b><br>
                </h4>
                <h5 align="center">
                    <b>{{ $fdate }}</b>
                </h5>
            </div>
        </div>
        <h4 align="center">
            <b>Servicios</b><br>
        </h4>
		@include('cash.reports.services')

        <h4 align="center">
            <b>Ingresos</b><br>
        </h4>
		@include('cash.reports.ingresses')

		<div class="row">
			<div class="col-md-12">
				<div class="col-xs-4">
					<div class="text-muted well well-sm">
						<p>Efectivo</p>
						<h4>{{ fnumber($methodsA['Efectivo'] + $methodsB['Efectivo'] + $methodsE['Efectivo']) }}</h4>
					</div>
		    	</div>

				<div class="col-xs-4">
					<div class="text-muted well well-sm">
						<p>Tarjeta débito</p>
						<h4>{{ fnumber($methodsA['T. Debito'] + $methodsB['T. Debito'] + $methodsE['T. Debito']) }}</h4>
					</div>
		    	</div>

				<div class="col-xs-4">
					<div class="text-muted well well-sm">
						<p>Tarjeta crédito</p>
						<h4>{{ fnumber($methodsA['T. Credito'] + $methodsB['T. Credito'] + $methodsE['T. Credito']) }}</h4>
					</div>
		    	</div>

				<div class="col-xs-4">
					<div class="text-muted well well-sm">
						<p>Cheques</p>
						<h4>{{ fnumber($methodsA['Cheque'] + $methodsB['Cheque'] + $methodsE['Cheque']) }}</h4>
					</div>
		    	</div>

				<div class="col-xs-4">
					<div class="text-muted well well-sm">
						<p>Transferencias</p>
						<h4>{{ fnumber($methodsA['Transferencia'] + $methodsB['Transferencia'] + $methodsE['Transferencia']) }}</h4>
					</div>
				</div>

				<div class="col-xs-4">
					<div class="text-muted well well-sm">
						<p>Crédito</p>
						<h4>{{ fnumber($methodsA['Credito'] + $methodsB['Credito'] + $methodsC['Credito'] + $methodsD['Credito']) }}</h4>
					</div>
				</div>


				<div class="col-xs-12">
					<div align="center" class="text-muted well well-sm">
						<p>Ingresos Totales</p>
						<h3>{{ fnumber($total) }}</h3>
					</div>
				</div>
			</div>
	    </div>
	</section>
</body>
</html>
