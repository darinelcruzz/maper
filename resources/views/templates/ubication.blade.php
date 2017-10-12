<div class="box-header with-border">
    <h3 class="box-title">Ubicación
        <i class="fa fa-map-marker" aria-hidden="true"></i>
    </h3>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::text('origin', isset($service) ? $service->origin: null)!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('destination', isset($service) ? $service->destination: null)!!}
    </div>
    <div class="col-md-4">
        {!! Field::number('amount', isset($service) ? $service->amount: null, ['label' => 'Arrastre estimado', 'min' => '0'])!!}
   </div>
</div>

<div class="row">
    @if($ser == 'corp')
        <div class="col-md-4">
            {!! Field::number('maneuver', isset($service) ? $service->maneuver: null, ['label' => 'Maniobra estimado', 'min' => '0'])!!}
       </div>
    @endif
    <div class="col-md-4">
        <br><a href="https://google.com.mx/maps" target="_blank" class="btn btn-success btn-block">Google Maps
            <i class="fa fa-map-pin" aria-hidden="true"></i>
        </a>
    </div>
</div>
