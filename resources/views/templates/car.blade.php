<div class="box-header with-border">
    <h3 class="box-title">Vehículo
        <i class="fa fa-car" aria-hidden="true"></i>
    </h3>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::text('brand', isset($service) ? $service->brand: null)!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('model', isset($service) ? $service->model: null)!!}
    </div>
    <div class="col-md-4">
        {!! Field::select('type',
            ['moto' => 'Moto', 'coche' => 'Coche', '3' => '3.5 a 4.5 Ton', '4' => '5 a 9 Ton', '5' => 'Mas de 10 Ton'], isset($service) ? $service->type: null, ['empty' => 'Seleccione el tipo'])
        !!}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::number('load', isset($service) ? $service->load: null, ['min' => '0'])!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('plate', isset($service) ? $service->plate: null)!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('color', isset($service) ? $service->color: null)!!}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::number('inventory', isset($service) ? $service->inventory: null, ['min' => '0'])!!}
    </div>
    <div class="col-md-4">
        {!! Field::select('key',
            ['si' => 'Si', 'no' => 'No'], isset($service) ? $service->key: null, ['empty' => '¿Tenía llave?'])
        !!}
    </div>
</div>
