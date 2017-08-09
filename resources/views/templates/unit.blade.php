<div class="box-header with-border">
    <h3 class="box-title">Unidad
        <i class="fa fa-truck" aria-hidden="true"></i>
    </h3>
</div>

<div class="row">
    <div class="col-md-4">
        {!! Field::select('driver', $drivers, isset($service) ? $service->driver: null, ['empty' => 'Seleccione al operador'])
        !!}
    </div>
    <div class="col-md-4">
        {!! Field::select('unit', $units, isset($service) ? $service->unit: null, ['empty' => 'Seleccione la unidad']) !!}
    </div>
    <div class="col-md-4">
        <div id="field_date" class="form-group">
            <label for="date_return" class="control-label">
                Fecha y hora regreso:
            </label>
            <div class="controls">
                <input class="form-control" id="date_return" name="date_return" type="datetime-local" value="{{  isset($service) ? date('Y-m-d\TH:i', strtotime($service->date_service)) : date('Y-m-d\TH:i') }}">
            </div>
        </div>
   </div>
