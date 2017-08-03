<div class="box-header with-border">
    <h3 class="box-title">Ubicación
        <i class="fa fa-map-marker" aria-hidden="true"></i>
    </h3>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::text('username', isset($service) ? $service->username: null)!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('origin', isset($service) ? $service->origin: null)!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('destination', isset($service) ? $service->destination: null)!!}
    </div>
</div>
