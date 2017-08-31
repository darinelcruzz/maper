@if($ser == 'corp')
    <div class="row">
        <div class="col-md-4">
            {!! Field::text('releaser', isset($service) ? $service->releaser: null)!!}
        </div>
    </div>
@endif

<div class="box-header with-border">
    <h3 class="box-title">Pago
        <i class="fa fa-dollar" aria-hidden="true"></i>
    </h3>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::number('amount', isset($service) ? $service->amount: 0, ['label' => 'Arrastre', 'min' => '0', 'step' => '.01'])!!}
    </div>
    <div class="col-md-4">
        {!! Field::number('maneuver', isset($service) ? $service->maneuver: 0, ['min' => '0', 'step' => '.01'])!!}
    </div>
    <div class="col-md-4">
        @if($ser == 'gen')
            {!! Field::number('others', isset($service) ? $service->others: 0, ['min' => '0', 'step' => '.01'])!!}
        @else
            {!! Field::number('pension', isset($service->pension) ? $service->pension: $cost,['disabled'=> 'true', 'min' => '0', 'step' => '.01'])!!}
        @endif
    </div>
</div>

@if($ser == 'corp')
    <div class="row">
        <div class="col-md-8"></div>
        <div class="col-md-4">
           <h4><B>Subtotal $</B></h4>
       </div>
    </div>
    <div class="row">
        <div  class="col-md-4"></div>
        <div class="col-md-4">
            {!! Field::text('reason', isset($service) ? $service->reason: null)!!}
        </div>
        <div class="col-md-4">
            {!! Field::number('discount', isset($service) ? $service->discount: 0,['min' => '0', 'step' => '.01'])!!}
        </div>
    </div>
@endif
<div class="row">
    <div class="col-md-4">
        {!! Field::select('pay',
            ['Efectivo' => 'Efectivo', 'T. Debito' => 'T. Debito', 'T. Credito' => 'T. Credito',
            'Transferencia' => 'Transferencia', 'Cheque' => 'Cheque', 'Credito' => 'Credito'], isset($service) ? $service->pay: null, ['empty' => '¿Cómo pagó?'])
        !!}
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
       <h3><B>Total $</B></h3>
   </div>
</div>
