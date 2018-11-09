<div class="row">
    <div class="col-md-4 col-md-offset-4">
        
        @if($ser == 'gen')
            <div class="row">
                <div class="col-md-9">
                    {!! Field::select('client_id', $clients, isset($service) ? $service->client_id: null, ['empty' => 'Seleccione al cliente', 'class' => 'select2', 'tpl' => 'templates/twolines'])!!}
                </div>
                <div class="col-md-3">
                    <label>&nbsp;</label><br>
                    <button type="button" class="btn btn-sm btn-danger btn-block" data-toggle="modal" data-target="#client">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-12">
                    {!! Field::select('service',
                        ['Tránsito del Estado' => 'Tránsito del Estado', 'Vialidad Municipal' => 'Vialidad Municipal', 'Policia Municipal' => 'Policia Municipal',
                        'Fiscalía' => 'Fiscalía', 'Federal' => 'Federal', 'PGR' => 'PGR'], isset($service) ? $service->service: null, ['empty' => '¿A que corresponde?', 'tpl' => 'templates/twolines'])
                    !!}
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                {!! Field::text('description', isset($service) ? $service->description: null, ['tpl' => 'templates/twolines'])!!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                {!! Field::datetimelocal('date_service', isset($service) ? date('Y-m-d\TH:i', strtotime($service->date_service)) : null, ['label' => 'Fecha y hora', 'tpl' => 'templates/twolines']) !!}
           </div>
        </div>
    </div>
</div>

<br>
