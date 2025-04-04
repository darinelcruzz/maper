<div class="row">
    <div class="col-md-12">

        @if($ser == 'gen')
            <div class="row">
                <div class="col-md-11">
                    {!! Field::select('client_id', $clients, isset($service) ? $service->client_id: null, ['empty' => 'Seleccione al cliente', 'class' => 'select2', 'tpl' => 'templates/twolines'])!!}
                </div>
                <div class="col-md-1">
                    <label for="">&nbsp;</label><br>
                    <button type="button" class="btn btn-sm btn-danger pull-rigth btn-block" data-toggle="modal" data-target="#client">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </button>                    
                </div>
            </div>
        @else
            {!! Field::select('service',
                ['Tránsito del Estado' => 'Tránsito del Estado', 'Vialidad Municipal' => 'Vialidad Municipal', 'Policia Municipal' => 'Policia Municipal',
                'Fiscalía' => 'Fiscalía', 'Federal' => 'Federal', 'PGR' => 'PGR', 'Delegación de transportes del Estado' => 'Delegación de transportes del Estado', 'Guardia Nacional' => 'Guardia Nacional'],
                isset($service) ? $service->service: null, ['empty' => '¿A que corresponde?', 'tpl' => 'templates/twolines'])
            !!}
        @endif

        {!! Field::text('description', isset($service) ? $service->description: null, ['tpl' => 'templates/twolines', 'ph' => 'Servicio por...'])!!}
        {!! Field::datetimelocal('date_service', isset($service) ? fdate($service->date_service, 'Y-m-d\TH:i') : date('Y-m-d\TH:i'), ['tpl' => 'templates/twolines']) !!}
        
    </div>
</div>

<br>
