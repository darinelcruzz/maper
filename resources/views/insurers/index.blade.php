@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <solid-box title="Lista de aseguradoras" color="danger">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width: 25%">Nombre</th>
                                <th style="width: 30%">Dirección</th>
                                <th>Saldo</th>
                                <th style="width: 12%"># Recepción</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($insurers as $insurer)
                                <tr>
                                    <td>{{ $insurer->id}}</td>
                                    <td>
                                        <a href="{{ route('insurer.details', ['id' => $insurer->id]) }}"> {{ $insurer->name }} </a>
                                        {!! $insurer->rfc != '0' ? '<br> R.F.C. <span style="color: red">' . $insurer->rfc . '</span>': '' !!}
                                    </td>
                                    <td>
                                        {{ $insurer->address }}
                                        {!! $insurer->phone != '0' ? '<br> <i class="fa fa-phone"></i> <span style="color: blue">' . $insurer->phone . '</span>': '' !!}
                                    </td>
                                    <td style="text-align: right;">{{ fnumber($insurer->total_sum) }}</td>
                                    <td>{{ $insurer->reception }}</td>
                                    <td>{{ $insurer->observations }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </solid-box>
        </div>
    </div>

@endsection
