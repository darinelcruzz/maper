@extends('admin')

@section('main-content')

<div class="row">
    <div class="col-md-4">
        <simple-box title="Agregar ticket" color="danger">
            {!! Form::open(['method' => 'POST', 'route' => 'gas.store']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::date('date') !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::number('ticket', ['min' => '0']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::select('product',['Magna' => 'Magna', 'Premium' => 'Premium', 'Disel' => 'Disel'], ['empty' => 'Seleccione el producto'])!!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::number('total', ['min' => '0', 'step' => '0.01']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Field::text('observations')!!}
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {!! Form::submit('Crear', ['class' => 'btn btn-black btn-block']) !!}
            </div>

            {!! Form::close() !!}
        </simple-box>
    </div>
    <div class="col-md-8">
        <div class="row">
            <data-table-com title="Pendientes" example="example1" color="danger" button>
                {{ drawHeader('ID', 'Fecha', 'Producto', 'Observaciones', 'Total', '') }}

                <template slot="body">
                    @php
                    $all = 0;
                    @endphp
                    @foreach($pendings as $row)
                        @php
                        $all += $row->total;
                        @endphp
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ fdate($row->date, 'd/m/Y', 'Y-m-d') }}</td>
                            <td>{{ $row->product }}</td>
                            <td>{{ $row->observations }}</td>
                            <td>{{ fnumber($row->total) }}</td>
                            <td><a href="{{ route('gas.verify', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a></td>
                        </tr>
                    @endforeach
                </template>
                <template slot="footer">
                    <tr>
                        <td colspan="3"></td>
                        <td ><b>Total:</b></td>
                        <td>{{ fnumber($all) }}</td>
                    </tr>
                </template>
            </data-table-com>
        </div>
        <div class="row">
            <data-table-com title="Pagadas" example="example2" color="success" button collapsed>
                {{ drawHeader('ID', 'Fecha', 'Producto', 'Observaciones', 'Total') }}

                <template slot="body">
                    @php
                    $all = 0;
                    @endphp
                    @foreach($payed as $row)
                        @php
                        $all += $row->total;
                        @endphp
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ fdate($row->date, 'd/m/Y', 'Y-m-d') }}</td>
                            <td>{{ $row->product }}</td>
                            <td>{{ $row->observations }}</td>
                            <td>{{ fnumber($row->total) }}</td>
                        </tr>
                    @endforeach
                </template>
                <template slot="footer">
                    <tr>
                        <td colspan="3"></td>
                        <td ><b>Total:</b></td>
                        <td>$ {{ number_format($all,2) }}</td>
                    </tr>
                </template>
            </data-table-com>
        </div>
    </div>
</div>



@endsection
