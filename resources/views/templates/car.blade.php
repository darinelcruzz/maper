<div class="row">
    <div class="col-md-4">
        {!! Field::text('brand', isset($service) ? $service->brand : null, ['tpl' => 'templates/twolines'])!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('type', isset($service) ? $service->type : null, ['tpl' => 'templates/twolines'])!!}
    </div>
    <div class="col-md-4">
        {!! Field::select('category', ['Moto' => 'Moto', 'Coche' => 'Coche', 'Camioneta' => 'Camioneta' , 'Camion' => 'Camion',
            'Autobus' => 'Autobus', 'Remolque' => 'Remolque', 'Tractocamión' => 'Tractocamión', 'Maquinaria' => 'Maquinaria',
          'Combi' => 'Combi', 'Ganado' => 'Ganado', 'Combustible' => 'Combustible', 'Tractor' => 'Tractor'],
            isset($service) ? $service->category : null, ['empty' => 'Seleccione la categoría', 'tpl' => 'templates/twolines']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::number('load', isset($service) ? $service->load : 0, ['min' => '0', 'tpl' => 'templates/twolines', 'step' => '0.01'])!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('plate', isset($service) ? $service->plate : null, ['label' => 'Placas / # Económico', 'tpl' => 'templates/twolines', 'ph' => 'ejemplo: 840ET3'])!!}
    </div>
    <div class="col-md-4">
        {!! Field::text('color', isset($service) ? $service->color : null, ['tpl' => 'templates/twolines', 'ph' => 'negro, azul, rojo, blanco o...'])!!}
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::number('inventory', isset($service) ? $service->inventory : 0, ['min' => '0', 'tpl' => 'templates/twolines', 'step' => '0.01'])!!}
    </div>
    @if($ser == 'corp')
        <div class="col-md-4">
            {!! Field::select('key',
                ['si' => 'Si', 'no' => 'No'], isset($service) ? $service->key : null, ['empty' => '¿Tenía llave?', 'tpl' => 'templates/twolines'])
            !!}
        </div>
        <div class="col-md-4">
            {!! Field::number('model', isset($service) ? $service->model : null, ['min' => '0', 'tpl' => 'templates/twolines'])!!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {!! Field::text('serial', isset($service) ? $service->serial : null, ['tpl' => 'templates/twolines'])!!}
        </div>
    @endif
</div>

<br>
