<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                {!! Field::text('origin', isset($service) ? $service->origin: null, ['tpl' => 'templates/twolines'])!!}
            </div>
            <div class="col-md-4">
                {!! Field::text('destination', isset($service) ? $service->destination: null, ['tpl' => 'templates/twolines'])!!}
            </div>
        </div>

        <div class="row">
             <div class="col-md-4">
                {!! Field::number('amount', isset($service) ? $service->amount: null, ['label' => 'Arrastre estimado', 'min' => '0', 'tpl' => 'templates/twolines', 'step' => '0.01'])!!}
           </div>
            <div class="col-md-4">
                {!! Field::number('maneuver', isset($service) ? $service->maneuver: null, ['label' => 'Maniobra estimado', 'min' => '0', 'tpl' => 'templates/twolines', 'step' => '0.01'])!!}
           </div>
            <div class="col-md-4">
                {!! Field::number('km', isset($service) ? $service->km: null, ['min' => '0', 'tpl' => 'templates/twolines'])!!}
           </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <br><a href="https://google.com.mx/maps" target="_blank" class="btn btn-success btn-block">Google Maps
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
    </div>
</div>

<br>
