@extends('admin')

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <solid-box title="Lista de aseguradoras" color="box-danger">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>R.F.C.</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($insurers as $insurer)
                                <tr>
                                    <td>{{ $insurer->name }}</td>
                                    <td>{{ $insurer->rfc }}</td>
                                    <td>{{ $insurer->address }}</td>
                                    <td>{{ $insurer->phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </solid-box>
        </div>
    </div>

@endsection
