<?php

Route::get('salir', function (){
    Auth::logout();
    return redirect('/');
})->name('getout');

// Servicios

Route::get('servicios', [
    'uses' => 'ServiceController@show',
    'as' => 'service.show'
]);
    // Publico General
    Route::group(['prefix' => 'servicios/publico', 'as' => 'service.public.'], function () {
        Route::get('crear', [
            'uses' => 'PublicServiceController@create',
            'as' => 'create'
        ]);

        Route::post('crear', [
            'uses' => 'PublicServiceController@store',
            'as' => 'store'
        ]);


        Route::get('editar/{id}', [
            'uses' => 'PublicServiceController@edit',
            'as' => 'edit'
        ]);

        Route::get('eliminar/{id}', [
            'uses' => 'PublicServiceController@deleteClient',
            'as' => 'delete'
        ]);

        Route::post('cambiar', [
            'uses' => 'PublicServiceController@change',
            'as' => 'change'
        ]);

        Route::get('detalles/{service}', [
            'uses' => 'PublicServiceController@details',
            'as' => 'details'
        ]);

        Route::get('pay/{service}', [
            'uses' => 'PublicServiceController@pay',
            'as' => 'pay'
        ]);
    });

    // Corporaciones
    Route::group(['prefix' => 'servicios/corporaciones', 'as' => 'service.corporation.'], function () {
        Route::get('crear', [
            'uses' => 'CorporationServiceController@create',
            'as' => 'create'
        ]);

        Route::post('crear', [
            'uses' => 'CorporationServiceController@store',
            'as' => 'store'
        ]);


        Route::get('editar/{id}', [
            'uses' => 'CorporationServiceController@edit',
            'as' => 'edit'
        ]);

        Route::get('eliminar/{id}', [
            'uses' => 'CorporationServiceController@deleteClient',
            'as' => 'delete'
        ]);

        Route::post('cambiar', [
            'uses' => 'CorporationServiceController@change',
            'as' => 'change'
        ]);

        Route::get('detalles/{service}', [
            'uses' => 'CorporationServiceController@details',
            'as' => 'details'
        ]);
    });

// Clientes
Route::group(['prefix' => 'clientes', 'as' => 'client.'], function () {
    Route::get('crear', [
        'uses' => 'ClientController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'ClientController@store',
        'as' => 'store'
    ]);

    Route::get('/', [
        'uses' => 'ClientController@show',
        'as' => 'show'
    ]);

    Route::get('editar/{id}', [
        'uses' => 'ClientController@edit',
        'as' => 'edit'
    ]);

    Route::get('eliminar/{id}', [
        'uses' => 'ClientController@deleteClient',
        'as' => 'delete'
    ]);

    Route::post('cambiar', [
        'uses' => 'ClientController@change',
        'as' => 'change'
    ]);
});

// Proveedores
Route::group(['prefix' => 'proveedores', 'as' => 'provider.'], function () {
    Route::get('crear', [
        'uses' => 'ProviderController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'ProviderController@store',
        'as' => 'store'
    ]);

    Route::get('/', [
        'uses' => 'ProviderController@show',
        'as' => 'show'
    ]);

    Route::get('editar/{id?}', [
        'uses' => 'ProviderController@edit',
        'as' => 'edit'
    ]);

    Route::post('cambiar', [
        'uses' => 'ProviderController@change',
        'as' => 'change'
    ]);
});

// Productos
Route::group(['prefix' => 'productos', 'as' => 'product.'], function () {
    Route::get('crear', [
        'uses' => 'ProductController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'ProductController@store',
        'as' => 'store'
    ]);

    Route::get('/lista', [
        'uses' => 'ProductController@show',
        'as' => 'show'
    ]);

    Route::get('editar/{id?}', [
        'uses' => 'ProductController@edit',
        'as' => 'edit'
    ]);

    Route::post('cambiar', [
        'uses' => 'ProductController@change',
        'as' => 'change'
    ]);
});

// Unidades
Route::group(['prefix' => 'unidades', 'as' => 'unit.'], function () {
    Route::get('crear', [
        'uses' => 'UnitController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'UnitController@store',
        'as' => 'store'
    ]);

    Route::get('/lista', [
        'uses' => 'UnitController@show',
        'as' => 'show'
    ]);

    Route::get('editar/{id?}', [
        'uses' => 'UnitController@edit',
        'as' => 'edit'
    ]);

    Route::post('cambiar', [
        'uses' => 'UnitController@change',
        'as' => 'change'
    ]);
});

// Usuarios
Route::group(['prefix' => 'usuarios', 'as' => 'user.'], function () {
    Route::get('crear', [
        'uses' => 'UserController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'UserController@store',
        'as' => 'store'
    ]);

    Route::get('/', [
        'uses' => 'UserController@show',
        'as' => 'show'
    ]);
});



Route::get('/', function () {
    return view('welcome');
})->name('home');
