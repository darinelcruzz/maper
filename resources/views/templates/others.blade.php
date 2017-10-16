<div class="box-header with-border">
    <h3 class="box-title">Otros
        <i class="fa fa-random" aria-hidden="true"></i>
    </h3>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::number('ret', isset($service) ? $service->ret: null, ['min' => '0', 'step' => '0.01'])!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('bill', isset($service) ? $service->bill: null)!!}
    </div>
</div>
