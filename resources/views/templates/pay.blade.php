<payment-box ser="{{ $ser }}" amount="{{ $service->amount or 0 }}" maneuver="{{ $service->maneuver or 0 }}" others="{{ $service->others or 0 }}" pension="{{ $cost or 0 }}" discount="0">
    <template slot="releaser">
        {!! Field::text('releaser', isset($service) ? $service->releaser: null)!!}
    </template>

    <template slot="reason">
        {!! Field::text('reason', isset($service) ? $service->reason: null)!!}
    </template>

    <template slot="select">
        {!! Field::select('pay',
            ['Efectivo' => 'Efectivo', 'T. Debito' => 'T. Debito', 'T. Credito' => 'T. Credito',
            'Transferencia' => 'Transferencia', 'Cheque' => 'Cheque'], isset($service) ? $service->pay: null, ['empty' => '¿Cómo pagó?'])
        !!}
    </template>
</payment-box>
