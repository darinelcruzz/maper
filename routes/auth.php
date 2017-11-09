<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Aseguradoras
Route::group(['prefix' => 'aseguradoras/ike', 'as' => 'ike.'], function () {
    $ctrl = 'IkeServiceController';

    Route::get('/', usesas("$ctrl@index", 'index'));

    Route::get('/{ikeservice}', usesas("$ctrl@show", 'show'));

    Route::get('crear', usesas("$ctrl@create", 'create'));

    Route::post('crear', usesas("$ctrl@store", 'store'));

    Route::get('editar/{ikeservice}', usesas("$ctrl@edit", 'edit'));

    Route::post('editar', usesas("$ctrl@update", 'update'));
});

//Admin
Route::group(['prefix' => 'administracion', 'as' => 'admin.'], function () {
    Route::get('caja', [
        'uses' => 'AdministrationController@cash',
        'as' => 'cash'
    ]);
    Route::post('caja', [
        'uses' => 'AdministrationController@cash',
        'as' => 'cash'
    ]);
});

// Servicios
Route::get('servicios', [
    'uses' => 'ServiceController@show',
    'as' => 'service.show'
]);

Route::post('servicios', [
    'uses' => 'ServiceController@changeExtras',
    'as' => 'service.changeExtras'
]);

// General
Route::group(['prefix' => 'servicios/general', 'as' => 'service.general.'], function () {
    $ctrl = 'GeneralServiceController';

    Route::get('crear', usesas("$ctrl@create", 'create'));

    Route::post('crear', usesas("$ctrl@store", 'store'));

    Route::get('editar/{service}', usesas("$ctrl@edit", 'edit'));

    Route::get('eliminar/{id}', usesas("$ctrl@deleteClient", 'delete'));

    Route::post('cambiar', usesas("$ctrl@change", 'change'));

    Route::get('detalles/{service}', usesas("$ctrl@details", 'details'));

    Route::get('pago/{service}', usesas("$ctrl@pay", 'pay'));

    Route::post('pago', usesas("$ctrl@change", 'setPayMethod'));

    Route::get('cancelar/{service}', usesas("$ctrl@cancel", 'cancel'));
});

// Corporaciones
Route::group(['prefix' => 'servicios/corporaciones', 'as' => 'service.corporation.'], function () {
    $ctrl = 'CorporationServiceController';

    Route::get('crear', usesas("$ctrl@create", 'create'));

    Route::post('crear', usesas("$ctrl@store", 'store'));

    Route::get('editar/{service}', usesas("$ctrl@edit", 'edit'));

    Route::get('eliminar/{id}', usesas("$ctrl@deleteClient", 'delete'));

    Route::post('cambiar', usesas("$ctrl@update", 'update'));

    Route::get('detalles/{service}', usesas("$ctrl@details", 'details'));

    Route::get('pago/{service}', usesas("$ctrl@pay", 'pay'));

    Route::get('formato/{service}', usesas("$ctrl@printLetter", 'print'));
});

// Clientes
Route::group(['prefix' => 'clientes', 'as' => 'client.'], function () {
    $ctrl = 'ClientController';

    Route::get('/', usesas("$ctrl@show", 'show'));

    Route::get('crear', usesas("$ctrl@create", 'create'));

    Route::post('crear', usesas("$ctrl@store", 'store'));

    Route::get('editar/{id}', usesas("$ctrl@edit", 'edit'));

    Route::post('cambiar', usesas("$ctrl@change", 'change'));

    Route::get('detalles/{client}', usesas("$ctrl@details", 'details'));

    Route::get('eliminar/{id}', usesas("$ctrl@deleteClient", 'delete'));
});

// Proveedores
Route::group(['prefix' => 'proveedores', 'as' => 'provider.'], function () {
    $ctrl = 'ProviderController';

    Route::get('crear', usesas("$ctrl@create", 'create'));

    Route::post('crear', usesas("$ctrl@store", 'store'));

    Route::get('/', usesas("$ctrl@show", 'show'));

    Route::get('editar/{id?}', usesas("$ctrl@edit", 'edit'));

    Route::post('cambiar', usesas("$ctrl@change", 'change'));
});

// Productos
Route::group(['prefix' => 'productos', 'as' => 'product.'], function () {
    $ctrl = 'ProductController';

    Route::get('crear', usesas("$ctrl@create",'create'));

    Route::post('crear', usesas("$ctrl@store",'store'));

    Route::get('/lista', usesas("$ctrl@show",'show'));

    Route::get('editar/{id?}', usesas("$ctrl@edit",'edit'));

    Route::post('cambiar', usesas("$ctrl@change",'change'));
});

// Precios
Route::group(['prefix' => 'precios', 'as' => 'price.'], function () {
    $ctrl = 'PriceController';

    Route::get('crear', usesas("$ctrl@create", 'create'));

    Route::post('crear', usesas("$ctrl@store", 'store'));

    Route::get('/lista', usesas("$ctrl@show", 'show'));

    Route::get('editar/{price}', usesas("$ctrl@edit", 'edit'));

    Route::post('cambiar', usesas("$ctrl@change", 'change'));
});

// Gastos
Route::group(['prefix' => 'gastos', 'as' => 'expense.'], function () {
    $ctrl = 'ExpenseController';

    Route::get('crear', usesas("$ctrl@create", 'create'));

    Route::post('crear', usesas("$ctrl@store", 'store'));

    Route::get('/lista', usesas("$ctrl@show", 'show'));

    Route::get('editar/{expense}', usesas("$ctrl@edit", 'edit'));

    Route::post('cambiar', usesas("$ctrl@change", 'change'));

    Route::post('formato', usesas("$ctrl@format", 'format'));
});

// Bancos
Route::group(['prefix' => 'banco', 'as' => 'bank.'], function () {
    $ctrl = 'BankController';

    Route::get('crear', usesas("$ctrl@create", 'create'));

    Route::post('crear', usesas("$ctrl@store", 'store'));

    Route::get('/lista', usesas("$ctrl@show", 'show'));

    Route::get('editar/{expense}', usesas("$ctrl@edit", 'edit'));

    Route::post('cambiar', usesas("$ctrl@change", 'change'));

    Route::post('actualizar', usesas("$ctrl@update", 'update'));

    Route::post('formato', usesas("$ctrl@format", 'format'));
});

// Recursos
Route::get('recursos', [
    'uses' => 'ResourcesController@show',
    'as' => 'resources.show'
]);

// Operadores
Route::group(['prefix' => 'recursos/operadores', 'as' => 'resources.driver.'], function () {
    $ctrl = 'DriverController';

    Route::get('crear', usesas("$ctrl@create", 'create'));

    Route::post('crear', usesas("$ctrl@store", 'store'));

    Route::get('editar/{driver}', usesas("$ctrl@edit", 'edit'));

    Route::post('cambiar', usesas("$ctrl@change", 'change'));

    Route::get('fecha', usesas("$ctrl@date", 'date'));

    Route::post('reporte', usesas("$ctrl@format", 'format'));
});

// Unidades
Route::group(['prefix' => 'recursos/unidades', 'as' => 'resources.unit.'], function () {
    $ctrl = 'UnitController';

    Route::get('crear', usesas("$ctrl@create", 'create'));

    Route::post('crear', usesas("$ctrl@store", 'store'));

    Route::get('editar/{id?}', usesas("$ctrl@edit", 'edit'));

    Route::post('cambiar', usesas("$ctrl@change", 'change'));
});

// Usuarios
Route::group(['prefix' => 'usuarios', 'as' => 'user.'], function () {
    $ctrl = 'UserController';

    Route::get('/', ['uses' => "$ctrl@show", 'as' => 'show']);

    Route::get('crear', usesas("$ctrl@create", 'create'));

    Route::post('crear', usesas("$ctrl@store", 'store'));

    Route::get('editar/{user}', usesas("$ctrl@edit", 'edit'));

    Route::post('cambiar', usesas("$ctrl@change", 'change'));
});
