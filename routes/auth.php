<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Aseguradoras
Route::group(['prefix' => 'aseguradoras', 'as' => 'insurer.'], function () {
    $ctrl = 'InsurerController';

    Route::get('/', usesas($ctrl, 'index'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{insurer}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
});

//Admin
Route::group(['prefix' => 'administracion', 'as' => 'admin.'], function () {
    Route::match(['get', 'post'], 'caja', usesas('AdministrationController', 'cash'));
});

// Servicios
Route::get('servicios', usesas('ServiceController', 'service.show'));

Route::post('servicios', usesas('ServiceController@changeExtras', 'service.changeExtras'));

// General
Route::group(['prefix' => 'servicios/general', 'as' => 'service.general.'], function () {
    $ctrl = 'GeneralServiceController';

    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{service}', usesas($ctrl, 'edit'));
    Route::get('eliminar/{id}', usesas($ctrl, "deleteClient", 'delete'));
    Route::post('cambiar', usesas($ctrl, 'change'));
    Route::get('detalles/{service}', usesas($ctrl, 'details'));
    Route::get('pago/{service}', usesas($ctrl, 'pay'));
    Route::post('pago', usesas($ctrl, "change", 'setPayMethod'));
    Route::get('cancelar/{service}', usesas($ctrl, 'cancel'));
});

// Corporaciones
Route::group(['prefix' => 'servicios/corporaciones', 'as' => 'service.corporation.'], function () {
    $ctrl = 'CorporationServiceController';

    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{service}', usesas($ctrl, 'edit'));
    Route::get('eliminar/{id}', usesas($ctrl, "deleteClient", 'delete'));
    Route::post('cambiar', usesas($ctrl, 'update'));
    Route::get('detalles/{service}', usesas($ctrl, 'details'));
    Route::get('pago/{service}', usesas($ctrl, 'pay'));
    Route::get('formato/{service}', usesas($ctrl, "printLetter", 'print'));
});

// Aseguradoras
Route::group(['prefix' => 'servicios/aseguradoras', 'as' => 'service.insurer.'], function () {
    $ctrl = 'InsurerServiceController';

    Route::get('/', usesas($ctrl, 'index'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
});

// Clientes
Route::group(['prefix' => 'clientes', 'as' => 'client.'], function () {
    $ctrl = 'ClientController';

    Route::get('/', usesas($ctrl, 'show'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{id}', usesas($ctrl, 'edit'));
    Route::post('cambiar', usesas($ctrl, 'change'));
    Route::get('detalles/{client}', usesas($ctrl, 'details'));
    Route::get('eliminar/{id}', usesas($ctrl, "deleteClient", 'delete'));
});

// Proveedores
Route::group(['prefix' => 'proveedores', 'as' => 'provider.'], function () {
    $ctrl = 'ProviderController';

    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('/', usesas($ctrl, 'show'));
    Route::get('editar/{id?}', usesas($ctrl, 'edit'));
    Route::post('cambiar', usesas($ctrl, 'change'));
});

// Productos
Route::group(['prefix' => 'productos', 'as' => 'product.'], function () {
    $ctrl = 'ProductController';

    Route::get('/', usesas($ctrl,'show'));
    Route::get('crear', usesas($ctrl,'create'));
    Route::post('crear', usesas($ctrl,'store'));
    Route::get('editar/{id}', usesas($ctrl,'edit'));
    Route::post('cambiar', usesas($ctrl,'change'));
});

// Precios
Route::group(['prefix' => 'precios', 'as' => 'price.'], function () {
    $ctrl = 'PriceController';

    Route::get('/', usesas($ctrl, 'show'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{price}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'change'));
});

// Gastos
Route::group(['prefix' => 'gastos', 'as' => 'expense.'], function () {
    $ctrl = 'ExpenseController';

    Route::get('/', usesas($ctrl, 'show'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{expense}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'change'));
    Route::post('formato', usesas($ctrl, 'format'));
});

// Bancos
Route::group(['prefix' => 'bancos', 'as' => 'bank.'], function () {
    $ctrl = 'BankController';

    Route::get('/', usesas($ctrl, 'show'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{expense}', usesas($ctrl, 'edit'));
    Route::post('cambiar', usesas($ctrl, 'change'));
    Route::post('actualizar', usesas($ctrl, 'update'));
    Route::post('formato', usesas($ctrl, 'format'));
});

// Recursos
Route::get('recursos', usesas('ResourcesController', 'show', 'resources.show'));

// Operadores
Route::group(['prefix' => 'recursos/operadores', 'as' => 'resources.driver.'], function () {
    $ctrl = 'DriverController';

    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{driver}', usesas($ctrl, 'edit'));
    Route::post('cambiar', usesas($ctrl, 'change'));
    Route::get('fecha', usesas($ctrl, 'date'));
    Route::post('reporte', usesas($ctrl, 'format'));
});

// Unidades
Route::group(['prefix' => 'recursos/unidades', 'as' => 'resources.unit.'], function () {
    $ctrl = 'UnitController';

    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{id}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'change'));
});

// Usuarios
Route::group(['prefix' => 'usuarios', 'as' => 'user.'], function () {
    $ctrl = 'UserController';

    Route::get('/', usesas($ctrl, 'index'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{user}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
});
