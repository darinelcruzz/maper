<?php

Route::get('salir', function (){
    Auth::logout();
    return redirect('/');
})->name('getout');

// Clientes
Route::group(['prefix' => 'servicios', 'as' => 'service.'], function () {
    Route::get('crear', [
        'uses' => 'ServiceController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'ServiceController@store',
        'as' => 'store'
    ]);

    Route::get('/', [
        'uses' => 'ServiceController@show',
        'as' => 'show'
    ]);

    Route::get('editar/{id}', [
        'uses' => 'ServiceController@edit',
        'as' => 'edit'
    ]);

    Route::get('eliminar/{id}', [
        'uses' => 'ServiceController@deleteClient',
        'as' => 'delete'
    ]);

    Route::post('cambiar', [
        'uses' => 'ServiceController@change',
        'as' => 'change'
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
