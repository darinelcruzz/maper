<div class="row">
    <div class="col-md-6">
        {!! Field::text('origin', isset($service) ? $service->origin: null, ['tpl' => 'templates/twolines', 'ph' => 'ejemplo: San Cristóbal de las Casas'])!!}
    </div>
    <div class="col-md-6">
        {!! Field::text('destination', isset($service) ? $service->destination: null, ['tpl' => 'templates/twolines', 'ph' => 'ejemplo: Comitán'])!!}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::number('amount', isset($service) ? $service->amount: 0, ['label' => 'Arrastre estimado', 'min' => '0', 'tpl' => 'templates/twolines', 'step' => '0.01'])!!}
    </div>
    <div class="col-md-4">
        {!! Field::number('maneuver', isset($service) ? $service->maneuver: 0, ['label' => 'Maniobra estimado', 'min' => '0', 'tpl' => 'templates/twolines', 'step' => '0.01'])!!}
    </div>
    <div class="col-md-4">
        {!! Field::number('km', isset($service) ? $service->km: 0, ['min' => '0', 'tpl' => 'templates/twolines'])!!}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <br>
        <a href="https://google.com.mx/maps" target="_blank" class="btn btn-success btn-block">Google Maps
            <i class="fa fa-map-pin" aria-hidden="true"></i>
        </a>
    </div>
    <div class="col-md-4">
        <br>
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-default">
            Tabulador
        </button>
    </div>
</div>
@include('templates.tabmodal')
<br>
