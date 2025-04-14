<div class="row">
  <div class="col-md-6">
    {!! Field::select('driver_id', $drivers, isset($service) ? $service->driver_id : null, ['empty' => 'Seleccione al operador', 'tpl' => 'templates/twolines']) !!}
  </div>
  <div class="col-md-6">
    {!! Field::select('helper', $drivers, isset($service) ? $service->helper: null, ['empty' => 'Seleccione al apoyo', 'tpl' => 'templates/twolines']) !!}
  </div>
</div>

<div class="row">
    <div class="col-md-6">
        {!! Field::select('unit_id', $units, isset($service) ? $service->unit_id : null, ['empty' => 'Seleccione la unidad', 'tpl' => 'templates/twolines']) !!}
    </div>
    @if($ser == 'corp')
     <div class="col-md-6">
         {!! Field::select('lot', ['cueva' => 'Cueva', 'corralón vaca' => 'Corralón Vaca'], isset($service) ? $service->lot : null, ['empty' => 'Seleccione el corralón', 'tpl' => 'templates/twolines'])
         !!}
     </div>
     @endif
</div>

<div class="row">
    <div class="col-md-6">
        {!! Field::datetimelocal('date_return', isset($service) ? fdate($service->date_return, 'Y-m-d\TH:i') : date('Y-m-d\TH:i'), ['tpl' => 'templates/twolines']) !!}
   </div>
</div>
<br>
