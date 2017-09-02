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
   <div class="col-md-4">
       {!! Field::number('bill', isset($service) ? $service->bill: null, ['min' => '0'])!!}
  </div>
</div>

<div class="row">
    @if($ser == 'corp')
        <div class="col-md-4">
            {!! Field::select('service',
                ['Tránsito del Estado' => 'Tránsito del Estado', 'Vialidad Municipal' => 'Vialidad Municipal', 'Policia Municipal' => 'Policia Municipal',
                'Fiscalía' => 'Fiscalía', 'Federal' => 'Federal'], isset($service) ? $service->service: null, ['empty' => '¿A que corresponde?'])
            !!}
        </div>
    @endif
</div>
