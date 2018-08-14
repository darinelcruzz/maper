<div class="box-header with-border">
    <h3 class="box-title">Unidad
        <i class="fa fa-truck" aria-hidden="true"></i>
    </h3>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::select('driver_id', $drivers, isset($service) ? $service->driver_id : null, ['empty' => 'Seleccione al operador']) !!}
    </div>
    <div class="col-md-4">
        {!! Field::select('unit_id', $units, isset($service) ? $service->unit_id : null, ['empty' => 'Seleccione la unidad']) !!}
    </div>
    <div class="col-md-4">
        <div id="field_date" class="form-group">
            <label for="date_return" class="control-label">
                Fecha y hora regreso:
            </label>
            <div class="controls">
                <input class="form-control" id="date_return" name="date_return" type="datetime-local" value="{{  isset($service) ? date('Y-m-d\TH:i', strtotime($service->date_return)) : '' }}">
            </div>
        </div>
   </div>
</div>
<div class="row">
    <div class="col-md-4">
        {!! Field::select('helper', $drivers, isset($service) ? $service->helper: null, ['empty' => 'Seleccione al apoyo']) !!}
    </div>
    @if($ser == 'corp')
       <div class="col-md-4">
           {!! Field::select('lot',
               ['cueva' => 'Cueva'], isset($service) ? $service->lot : null, ['empty' => 'Seleccione el corralón'])
           !!}
       </div>
   @endif
</div>
