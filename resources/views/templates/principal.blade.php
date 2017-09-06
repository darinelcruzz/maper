<div class="row">
    <div class="col-md-4">
        {!! Field::text('description', isset($service) ? $service->description: null)!!}
    </div>
    <div class="col-md-4">
        <div id="field_date" class="form-group">
            <label for="date_service" class="control-label">
                Fecha y hora:
            </label>
            <div class="controls">
                <input class="form-control" id="date_service" name="date_service" type="datetime-local" value="{{  isset($service) ? date('Y-m-d\TH:i', strtotime($service->date_service)) : date('Y-m-d\TH:i') }}">
            </div>
        </div>
   </div>
    @if($ser == 'corp')
        <div class="col-md-4">
            {!! Field::select('service',
                ['Tránsito del Estado' => 'Tránsito del Estado', 'Vialidad Municipal' => 'Vialidad Municipal', 'Policia Municipal' => 'Policia Municipal',
                'Fiscalía' => 'Fiscalía', 'Federal' => 'Federal'], isset($service) ? $service->service: null, ['empty' => '¿A que corresponde?'])
            !!}
        </div>
    @elseif($ser == 'gen')
            <div class="col-md-4">
                {!! Field::select('client', $clients, isset($service) ? $service->client: null, ['empty' => 'Seleccione al cliente'])!!}
            </div>
    @endif
</div>
