@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="General" example="example1" color="box-primary" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Vehículo</th>
                <th>Operador</th>
                <th>Estimado</th>
                <th>Opciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($general as $row)
                <tr>
                    <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>{{ $row->getShortDate('date_service') }}</td>
                    <td><a href="{{ route('client.details', ['id' => $row->clientr->id]) }}"> {{ $row->clientr->name }}</a></td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>{{ $row->driverr->name }} {{ isset($row->helper) ? ' - ' . $row->helperr->name : '' }}</td>
                    <td>${{ $row->total }}</td>
                    <td>
                        <a href="{{ route('service.general.pay', ['id' => $row->id]) }}" class="btn btn-success">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('service.general.cancel', ['id' => $row->id]) }}" class="btn btn-danger">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('service.general.edit', ['id' => $row->id]) }}"  class="btn btn-info">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Corporaciones" example="example2" color="box-primary" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Inventario</th>
                <th>Tipo</th>
                <th>Vehículo</th>
                <th>Operador</th>
                <th>Llave</th>
                <th>Opciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($corps as $row)
                <tr>
                    <td><a href="{{ route('service.corporation.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>{{ $row->getShortDate('date_service') }}</td>
                    <td>{{ $row->inventory }}</td>
                    <td>{{ $row->service }}</td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>{{ $row->driverr->name }} {{ isset($row->helper) ? ' - ' . $row->helperr->name : '' }}</td>
                    <td>{{ $row->key }}</td>
                    <td>
                        <a href="{{ route('service.corporation.pay', ['id' => $row->id]) }}" class="btn btn-success">
                            <i class="fa fa-hand-peace-o" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('service.corporation.edit', ['id' => $row->id]) }}" class="btn btn-info">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Liberados" example="example4" color="box-success" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha Liberación</th>
                <th>Inventario</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Liberador</th>
                <th>Importe</th>
                <th>Opciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($release as $row)
                <tr>
                    <td><a href="{{ route('service.corporation.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>{{ $row->getShortDate('date_out') }}</td>
                    <td>{{ $row->inventory }}</td>
                    <td>{{ $row->service }}</td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>{{ $row->releaser }}</td>
                    <td>${{ $row->total }} - {{ $row->pay }}</td>
                    <td>
                        <a href="{{ route('service.corporation.print', ['id' => $row->id]) }}" class="btn btn-default">
                            <i class="fa fa-print" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('service.corporation.edit', ['id' => $row->id]) }}" class="btn btn-info">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Pagados" example="example3" color="box-success" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha Pago</th>
                <th>Cliente</th>
                <th>Marca</th>
                <th>Importe</th>
                <th>Factura</th>
                <th>Opciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($paid as $row)
                <tr>
                    <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>{{  $row->pay_credit ? $row->getShortDate('date_credit') : $row->getShortDate('date_out')}}</td>
                    <td><a href="{{ route('client.details', ['id' => $row->clientr->id]) }}"> {{ $row->clientr->name }} </a></td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>${{ $row->total }} - {{  $row->pay_credit ? $row->pay_credit . " (". $row->pay . ")" : $row->pay }}</td>
                    <td>
                        @if ($row->bill != null)
                            {{ $row->bill }}
                        @else
                            @include('services/bill')
                      @endif
                  </td>
                  <td>
                      <a href="{{ route('service.general.edit', ['id' => $row->id]) }}" class="btn btn-info">
                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                  </td>
              </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Crédito" example="example5" color="box-teal" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Marca</th>
                <th>Importe</th>
                <th>Pagar</th>
                <th>Opciones</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($credit as $row)
                <tr>
                    <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>{{ $row->getShortDate('date_out') }}</td>
                    <td><a href="{{ route('client.details', ['id' => $row->clientr->id]) }}"> {{ $row->clientr->name }}</a></td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>${{ $row->total }}</td>
                    <td>
                        @include('services/assign') &nbsp;
                    </td>
                    <td>
                        <a href="{{ route('service.general.edit', ['id' => $row->id]) }}" class="btn btn-info">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cancelados" example="example6" color="box-danger" collapsed="collapsed-box">
        <template slot="header">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Marca</th>
                <th>Importe</th>
                <th>Razón</th>
            </tr>
        </template>

        <template slot="body">
            @foreach($cancel as $row)
                <tr>
                    <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>{{ $row->getShortDate('date_out') }}</td>
                    <td>{{ $row->clientr->name }}</td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>${{ $row->total }}</td>
                    <td>{{ $row->reason }}</td>
                </tr>
            @endforeach
        </template>
    </data-table>
@endsection
