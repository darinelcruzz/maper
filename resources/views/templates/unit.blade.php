<div class="row">
  <div class="col-md-6 col-md-offset-3">

      <div class="row">
          <div class="col-md-12">
              {!! Field::select('driver_id', $drivers, isset($service) ? $service->driver_id : null, ['empty' => 'Seleccione al operador', 'tpl' => 'templates/twolines']) !!}
          </div>
      </div>

      <div class="row">
          <div class="col-md-{{ $ser == 'corp' ? '6': '12'}}">
              {!! Field::select('helper', $drivers, isset($service) ? $service->helper: null, ['empty' => 'Seleccione al apoyo', 'tpl' => 'templates/twolines']) !!}
          </div>

          @if($ser == 'corp')
               <div class="col-md-6">
                   {!! Field::select('lot',
                       ['cueva' => 'Cueva'], isset($service) ? $service->lot : null, ['empty' => 'Seleccione el corralón', 'tpl' => 'templates/twolines'])
                   !!}
               </div>
           @endif
      </div>

      <div class="row">
          <div class="col-md-6">
              {!! Field::select('unit_id', $units, isset($service) ? $service->unit_id : null, ['empty' => 'Seleccione la unidad', 'tpl' => 'templates/twolines']) !!}
          </div>
          <div class="col-md-6">
              {!! Field::datetimelocal('date_return', isset($service) ? fdate($service->date_return, 'Y-m-d\TH:i') : null, ['tpl' => 'templates/twolines']) !!}
         </div>
      </div>

  </div>
</div>

<br>
