<div class="row">
    <div class="col-md-6">
        <simple-box title="Descuentos" color="danger">
            <table class="table table-bordered table-striped no-pagination">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Razón</th>
                        <th>Empleado</th>
                        <th>Fecha</th>
                        <th>Importe</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($discounts as $discount)
                        <tr>
                            <td>{{ $discount->id }}</td>
                            <td>{{ $discount->reason }}</td>
                            <td>{{ $discount->driver->name }}</td>
                            <td>{{ fdate($discount->discounted_at, 'd-m-Y', 'Y-m-d') }}</td>
                            <td>{{ fnumber($discount->amount) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </simple-box>
    </div>
    <div class="col-md-6">
        <simple-box title="Bonificaciones" color="success">
            <table class="table table-bordered table-striped no-pagination">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Razón</th>
                        <th>Empleado</th>
                        <th>Fecha</th>
                        <th>Importe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bonuses as $bonus)
                        <tr>
                            <td>{{ $bonus->id }}</td>
                            <td>{{ $bonus->reason }}</td>
                            <td>{{ $bonus->driver->name }}</td>
                            <td>{{ fdate($bonus->discounted_at, 'd-m-Y', 'Y-m-d') }}</td>
                            <td>{{ fnumber($bonus->amount) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </simple-box>
    </div>
</div>
