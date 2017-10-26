<?php

Auth::routes();

Route::get('salir', function (){
    Auth::logout();
    return redirect('/');
})->name('getout');

// Tests
Route::get('pruebas', function ()
{
    $services = App\Service::fromDateToDate('2017-08-04', '2017-10-02', 1);
    $extraHours = [];
    foreach ($services as $service) {
        array_push($extraHours, $service->extraHours);
    }
    return $extraHours;
});
