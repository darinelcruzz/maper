<html>
<head>
    <meta charset="UTF-8">
    <title>MAPER</title>
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
                    <b>{{ $client->name }}</b><br>
                </h2>
                <h5 align="center">
                    <b>{{ fdate(date('Y-m-d'), 'D, d \d\e F Y', 'Y-m-d') }}</b>
                </h5><br><br>
                <h5 align="center">
                    <b>{{ $status }}</b>
                </h5>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha Serv</th>
                            <th>Vehículo</th>
                            <th>Ruta</th>
                            <th>Días</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client->$type as $service)
                            @php
                                $days = $service->getDays('date_service', $today);
                            @endphp
                          <tr>
                              <td>{{ $service->id }}</td>
                              <td>{{ fdate($service->date_service, 'j/M/y, h:i a') }}</td>
                              <td>{{ $service->brand }} - {{ $service->type }} - {{ $service->color }}</td>
                              <td>{{ $service->origin . ' - ' . $service->destination }}</td>
                              <td>{!! $service->getExpired('date_service', $today, $client->days) !!}</td>
                              <td>{{ fnumber($service->total) }}</td>
                          </tr>
                      @endforeach
                      @if ($type == 'pending_services')
                          @foreach($client->payment_services as $row)
                              <tr>
                                  <td>{{ $row->id }}</td>
                                  <td>{{ fdate($row->date_service, 'j/M/y, h:i a') }}</td>
                                  <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                                  <td>{{ $service->origin . ' - ' . $service->destination }}</td>
                                  <td>{{ $row->getDays('date_service', $today) }}</td>
                                  <td>{{ fnumber($row->debt) }}</td>
                              </tr>
                          @endforeach
                      @endif
                  </tbody>
              <tfooter>
                  <tr>
                      <th colspan="4"></th>
                      <th><span class="pull-right">Total</span></th>
                      <th>
                          @if ($type == 'pending_services')
                              {{ fnumber($client->serviceTotal('pending') + $client->serviceTotal('payment')) }}
                          @endif
                      </th>
                  </tr>
              </tfooter>
        </table>
	</section>
</body>
</html>
