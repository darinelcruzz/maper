<?php

Auth::routes();

Route::get('salir', function (){
    Auth::logout();
    return redirect('/');
})->name('getout');

// Tests
Route::get('pruebas', function ()
{
    $service = App\Service::find(2);

    return $service->in_schedule ? 'true': 'false';
});
