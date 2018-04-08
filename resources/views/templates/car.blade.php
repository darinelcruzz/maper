<div class="box-header with-border">
    <h3 class="box-title">Vehículo
        <i class="fa fa-car" aria-hidden="true"></i>
    </h3>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::text('brand', isset($service) ? $service->brand : null)!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('type', isset($service) ? $service->type : null)!!}
    </div>
    <div class="col-md-4">
        {!! Field::select('category', ['Moto' => 'Moto', 'Coche' => 'Coche', 'Tractocamión' => 'Tractocamión'],
            isset($service) ? $service->category : null, ['empty' => 'Seleccione la categoría']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::number('load', isset($service) ? $service->load : null, ['min' => '0'])!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('plate', isset($service) ? $service->plate : null, ['label' => 'Placas / # Económico'])!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('color', isset($service) ? $service->color : null)!!}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::number('inventory', isset($service) ? $service->inventory : null, ['min' => '0'])!!}
    </div>
    @if($ser == 'corp')
        <div class="col-md-4">
            {!! Field::select('key',
                ['si' => 'Si', 'no' => 'No'], isset($service) ? $service->key : null, ['empty' => '¿Tenía llave?'])
            !!}
        </div>
        <div class="col-md-4">
            {!! Field::number('model', isset($service) ? $service->model : null, ['min' => '0'])!!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {!! Field::text('serial', isset($service) ? $service->serial : null)!!}
        </div>
    @endif
</div>
