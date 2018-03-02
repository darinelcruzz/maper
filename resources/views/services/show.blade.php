@extends('admin')

@section('main-content')

    <data-table col="col-md-12" title="General" example="example1" color="primary" collapsed button>

        {{ drawHeader('ID', 'fecha', 'cliente', 'vehículo', 'operador', 'estimado', 'opciones') }}

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

    <data-table col="col-md-12" title="Corporaciones" example="example2" color="primary" collapsed button>

        {{ drawHeader('ID', 'fecha', 'inventario', 'tipo', 'vehículo', 'operador', 'llave', 'opciones') }}

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

    <data-table col="col-md-12" title="Liberados" example="example4" color="success" collapsed button>

        {{ drawHeader('ID', 'fecha Liberación', 'inventario', 'tipo', 'marca', 'liberador', 'importe', 'opciones') }}

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

    <data-table col="col-md-12" title="Pagados" example="example3" color="success" collapsed button>

        {{ drawHeader('ID', 'fecha Pago', 'cliente', 'marca', 'importe', 'factura', 'opciones') }}

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
            @foreach($creditI as $row)
                @if ($row->status == 'pagado')
                    <tr>
                        <td>
                            <a href="{{ route('service.insurer.show', ['insurerService' => $row->id]) }}">
                                {{ $row->id }} (A)
                            </a>
                        </td>
                        <td></td>
                        <td>{{ $row->insurer->name }}</td>
                        <td>{{ $row->model }} - {{ $row->type }} - {{ $row->color }}</td>
                        <td>$ {{ number_format($row->amount, 2) }}</td>
                        <td>
                            @if ($row->bill != null)
                                {{ $row->bill }}
                            @else
                                {!! Form::open(['method' => 'POST', 'route' => 'service.insurer.bill']) !!}
                                  <div class="input-group input-group-sm">
                                      <input type="hidden" name="id" value="{{ $row->id }}">
                                      <input type="text" name="bill">
                                      <span class="input-group-btn">
                                        <button type="submit" class="btn btn-success btn-flat btn-xs">
                                            <i class="fa fa-check"></i>
                                        </button>
                                      </span>
                                  </div>
                                {!! Form::close() !!}
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('service.insurer.edit', ['insurerService' => $row->id])}}" class="btn btn-info">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Crédito" example="example5" color="info" collapsed button>

        {{ drawHeader('ID', 'fecha', 'cliente/Aseguradora', 'marca', 'importe', 'pagar', 'opciones') }}

        <template slot="body">
            @foreach($credit as $row)
                <tr>
                    <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>{{ $row->getShortDate('date_out') }}</td>
                    <td><a href="{{ route('client.details', ['id' => $row->clientr->id]) }}"> {{ $row->clientr->name }}</a></td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>$ {{ number_format($row->total, 2) }}</td>
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
            @foreach($creditI as $row)
                @if ($row->status == 'pendiente')
                    <tr>
                        <td>
                            <a href="{{ route('service.insurer.show', ['insurerService' => $row->id]) }}">
                                {{ $row->id }} (A)
                            </a>
                        </td>
                        <td></td>
                        <td>{{ $row->insurer->name }}</td>
                        <td>{{ $row->model }} - {{ $row->type }} - {{ $row->color }}</td>
                        <td>$ {{ number_format($row->amount, 2) }}</td>
                        <td>
                            @include('services/insurers/assign') &nbsp;
                        </td>
                        <td>
                            <a href="{{ route('service.insurer.edit', ['insurerService' => $row->id])}}" class="btn btn-info">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </template>
    </data-table>

    <data-table col="col-md-12" title="Cancelados" example="example6" color="danger" collapsed button>

        {{ drawHeader('ID', 'fecha', 'cliente', 'marca', 'importe', 'opciones') }}

        <template slot="body">
            @foreach($cancel as $row)
                <tr>
                    <td><a href="{{ route('service.general.details', ['id' => $row->id]) }}"> {{ $row->id }} </a></td>
                    <td>{{ $row->getShortDate('date_out') }}</td>
                    <td>{{ $row->clientr->name }}</td>
                    <td>{{ $row->brand }} - {{ $row->type }} - {{ $row->color }}</td>
                    <td>$ {{ number_format($row->total, 2) }}</td>
                    <td>{{ $row->reason }}</td>
                </tr>
            @endforeach
        </template>
    </data-table>
@endsection
