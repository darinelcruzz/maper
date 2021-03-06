@extends('admin')

@section('main-content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <simple-box title="Pagar factura # {{ $invoice->folio }}" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => ['invoice.confirm', $invoice]]) !!}
                    <div class="box-body">
                        @include('templates.headTable')
                                <tr>
                                    @if ($invoice->client)
                                        <td>
                                            <B>Cliente</B>
                                            <dd>{{ $invoice->client->name }}</dd>
                                        </td>
                                    @else
                                        <td>
                                            <B>Aseguradora</B>
                                            <dd>{{ $invoice->insurer->name }}</dd>
                                        </td>
                                    @endif
                                    <td></td>
                                    <td>
                                        <B>Fecha Factura:</B>
                                        <dd>{{ fdate($invoice->date, 'd/M/Y', 'Y-m-d') }}</dd>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <B>IVA:</B>
                                        <dd>{{ fnumber($invoice->iva) }}</dd>
                                    </td>
                                    <td>
                                        <B>Retención:</B>
                                        <dd>{{ fnumber($invoice->retention) }}</dd>
                                    </td>
                                    <td>
                                        <B>Importe:</B>
                                        <dd>{{ fnumber($invoice->amount) }}</dd>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('method',
                                    ['Efectivo' => 'Efectivo', 'T. Debito' => 'T. Debito', 'T. Credito' => 'T. Credito',
                                    'Transferencia' => 'Transferencia', 'Cheque' => 'Cheque'], isset($service) ? $service->pay: null, ['empty' => '¿Cómo pagó?'])
                                    !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('date_pay') !!}
                            </div>
                        </div>

                    <div class="box-footer">
                        <input type="hidden" name="id" value="{{ $invoice->id }}">
                        <input type="hidden" name="status" value="pagada">
                        {!! Form::submit('Pagar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </simple-box>
        </div>
    </div>
@endsection
