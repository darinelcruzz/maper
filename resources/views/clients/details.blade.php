@extends('admin')

@section('main-content')

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $client->short_name }}</h3>
                        <table style="width:100%">
                            <thead>
                                <tr>
                                    <th width="50%"><h4>Saldo</h4></th>
                                    <th width="50%"><h4>Pendientes</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><h3>${{ $totalPen }}</h3></td>
                                    <td><h3>{{ $pendings }}</h3></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Vencidas" example="example1" color="box-danger">
                    <template slot="header">
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Vehículo</th>
                            <th>Operador</th>
                            <th>Monto</th>
                        </tr>
                    </template>

                    <template slot="body">
                        @foreach($expired as $row)
                          <tr>
                              <td>{{ $row->id }}</td>
                              <td>{{ $row->getShortDate('date_service') }}</td>
                              <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                              <td>{{ $row->driverr->name }}</td>
                              <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                          </tr>
                        @endforeach
                    </template>

                    <template slot="footer">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Pendientes" example="example2" color="box-warning">
                    <template slot="header">
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Vehículo</th>
                            <th>Operador</th>
                            <th>Monto</th>
                        </tr>
                    </template>

                    <template slot="body">
                        @foreach($pending as $row)
                          <tr>
                              <td>{{ $row->id }}</td>
                              <td>{{ $row->getShortDate('date_service') }}</td>
                              <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                              <td>{{ $row->driverr->name }}</td>
                              <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                          </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>${{ $totalPen}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <data-table-com title="Pagadas" example="example3" color="box-success" collapsed="collapsed-box">
                    <template slot="header">
                        <tr>
                            <th>ID</th>
                            <th>Fecha</th>
                            <th>Vehículo</th>
                            <th>Operador</th>
                            <th>Monto</th>
                        </tr>
                    </template>

                    <template slot="body">
                        @foreach($payed as $row)
                          <tr>
                              <td>{{ $row->id }}</td>
                              <td>{{ $row->getShortDate('date_service') }}</td>
                              <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                              <td>{{ $row->driverr->name }}</td>
                              <td>${{ $row->total }}{{ $row->status == 'pendiente' || $row->status == 'corralon' ? ' (estimado)' : ''}}</td>
                          </tr>
                        @endforeach
                    </template>
                    <template slot="footer">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>${{ $totalPay}}</th>
                        </tr>
                    </template>
                </data-table-com>
            </div>
        </div>
    </div>
</div>
@endsection
