<div class="box-header with-border">
    <h3 class="box-title">Unidad
        <i class="fa fa-truck" aria-hidden="true"></i>
    </h3>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::select('driver',
            ['Juan Clemente' => 'Juan Clemente', 'Juan Manuel' => 'Juan Manuel', 'Francisco' => 'Francisco',
            'Rafael' => 'Rafael', 'Deberín' => 'Deberín'], isset($service) ? $service->driver: null, ['empty' => 'Seleccione al operador'])
        !!}
    </div>
    <div class="col-md-4">
        {!! Field::select('unit', $units, isset($service) ? $service->unit: null, ['empty' => 'Seleccione la unidad']) !!}
    </div>
</div>
