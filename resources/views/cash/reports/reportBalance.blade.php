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
                <h2 style="border: ridge #ff0000 1px;" align="center">
                    <b>Corte</b><br>
                </h2>
                <h5 align="center">
                    <b>{{ $fdate }}</b>
                </h5>
            </div>
        </div>

        @php
            $expenses = 0;
        @endphp
        @foreach ($drivers as $driver)
            @php
                // $salary = $driver->base_salary * $pay_days;
                $salary = $driver->base_salary;
                $extras = $totalExtras[$driver->id];
                $discount = $discounts->where('driver_id', $driver->id)->sum('amount');
                $expenses += $salary + $extras- $discount;
            @endphp
        @endforeach

		<div class="row">
			<div class="col-md-12">
				<div class="col-xs-3">
					<div class="text-muted well well-sm">
						<p>Efectivo</p>
						<h4>{{ fnumber($methodsA['Efectivo'] + $methodsB['Efectivo'] + $methodsE['Efectivo']) }}</h4>
					</div>
		    	</div>

				<div class="col-xs-3">
					<div class="text-muted well well-sm">
						<p>Tarjeta débito</p>
						<h4>{{ fnumber($methodsA['T. Debito'] + $methodsB['T. Debito'] + $methodsE['T. Debito']) }}</h4>
					</div>
		    	</div>

				<div class="col-xs-3">
					<div class="text-muted well well-sm">
						<p>Tarjeta crédito</p>
						<h4>{{ fnumber($methodsA['T. Credito'] + $methodsB['T. Credito'] + $methodsE['T. Credito']) }}</h4>
					</div>
		    	</div>

				<div class="col-xs-3">
					<div class="text-muted well well-sm">
						<p>Cheques</p>
						<h4>{{ fnumber($methodsA['Cheque'] + $methodsB['Cheque'] + $methodsE['Cheque']) }}</h4>
					</div>
		    	</div>

				<div class="col-xs-3">
					<div class="text-muted well well-sm">
						<p>Transferencias</p>
						<h4>{{ fnumber($methodsA['Transferencia'] + $methodsB['Transferencia'] + $methodsE['Transferencia']) }}</h4>
					</div>
				</div>

				<div class="col-xs-3">
					<div class="text-muted well well-sm">
						<p>Crédito</p>
						<h4>{{ fnumber($methodsA['Credito'] + $methodsB['Credito'] + $methodsC['Credito'] + $methodsD['Credito']) }}</h4>
					</div>
				</div>
                <div class="col-xs-3">
					<div class="text-muted well well-sm">
						<p><b>Ingresos Totales</b></p>
						<h4>{{ fnumber($total) }}</h4>
					</div>
				</div>
                <div class="col-xs-3">
					<div class="text-muted well well-sm">
						<p><b>Gastos</b></p>
						<h4>{{ fnumber($expenses) }}</h4>
					</div>
				</div>
                <div class="col-xs-12">
					<div align="center" color="success" class="text-muted well well-sm">
						<p><b>Utilidades</b></p>
						<h4>{{ fnumber($total - $expenses) }}</h4>
					</div>
				</div>
			</div>
	    </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Salario</th>
                            <th>Extras</th>
                            <th>Descuentos</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $tSalary = 0;
                            $tExtras = 0;
                            $tDiscount = 0;
                            $tPay = 0;
                        @endphp
                        @foreach ($drivers as $driver)
                            @php
                                $salary = $driver->base_salary;
                                $extras = $totalExtras[$driver->id];
                                $discount = $discounts->where('driver_id', $driver->id)->sum('amount');
                                $pay = $salary + $extras- $discount;
                            @endphp
                            <tr>
                                <td>{{ $driver->name }}</td>
                                <td>{{ fnumber($salary) }}</td>
                                <td>{{ fnumber($extras) }}</td>
                                <td>{{ fnumber($discount) }}</td>
                                <td>{{ fnumber($pay) }}</td>
                            </tr>
                            @php
                                $tSalary += $salary;
                                $tExtras += $extras ;
                                $tDiscount += $discount;
                                $tPay += $pay;
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><b>Total</b></td>
                            <td><b>{{ fnumber($tSalary) }}</b></td>
                            <td><b>{{ fnumber($tExtras) }}</b></td>
                            <td><b>{{ fnumber($tDiscount) }}</b></td>
                            <td><b>{{ fnumber($tPay) }}</b></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
	</section>
</body>
</html>
