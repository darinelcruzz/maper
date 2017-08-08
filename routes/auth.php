<?php

// Aseguradoras
Route::group(['prefix' => 'aseguradoras/ike', 'as' => 'ike.'], function () {
    Route::get('/', [
        'uses' => 'IkeServiceController@index',
        'as' => 'index'
    ]);

    Route::get('/{ikeservice}', [
        'uses' => 'IkeServiceController@show',
        'as' => 'show'
    ]);

    Route::get('crear', [
        'uses' => 'IkeServiceController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'IkeServiceController@store',
        'as' => 'store'
    ]);

    Route::get('editar/{ikeservice}', [
        'uses' => 'IkeServiceController@edit',
        'as' => 'edit'
    ]);

    Route::post('editar', [
        'uses' => 'IkeServiceController@update',
        'as' => 'update'
    ]);
});
