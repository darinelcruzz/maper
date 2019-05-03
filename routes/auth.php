<?php

Route::get('/', function () {
    expire();
    return view('welcome');

})->name('home');

// Aseguradoras
Route::group(['prefix' => 'aseguradoras', 'as' => 'insurer.'], function () {
    $ctrl = 'InsurerController';

    Route::get('/', usesas($ctrl, 'index'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{insurer}', usesas($ctrl, 'edit'))->middleware('one');
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('detalles/{insurer}', usesas($ctrl, 'details'));
});

//Admin
Route::group(['prefix' => 'administracion', 'as' => 'admin.'], function () {
    $ctrl = 'AdministrationController';

    Route::match(['get', 'post'], 'caja', usesas($ctrl, 'cash'));
    Route::get('reportes', usesas($ctrl, 'search'));
    Route::get('reporte/corte', usesas($ctrl, 'cut'));
    Route::post('reporte/corte', usesas($ctrl, 'reportBalance'));
    Route::post('reporte/servicios', usesas($ctrl, 'reportServices'));
    Route::get('reporte/liberados', usesas($ctrl, 'released'));
    Route::post('reporte/liberados', usesas($ctrl, 'reportReleased'));
});

// Servicios
Route::get('servicios', usesas('ServiceController', 'show', 'service.show'));
Route::get('servicios/horas/{service}', usesas('ServiceController', 'editHour', 'service.editHour'));
Route::post('servicios/horas', usesas('ServiceController', 'updateHour', 'service.updateHour'));

// General
Route::group(['prefix' => 'servicios/general', 'as' => 'service.general.'], function () {
    $ctrl = 'GeneralServiceController';

    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{service}', usesas($ctrl, 'edit'));
    Route::post('editar/{service}', usesas($ctrl, 'update'));
    Route::get('detalles/{service}', usesas($ctrl, 'details'));
    Route::get('pago/{service}', usesas($ctrl, 'pay'));
    Route::post('pago/{service}', usesas($ctrl, 'change'));
    Route::get('abonos/{service}', usesas($ctrl, 'payments'));
    Route::post('abonos/{service}', usesas($ctrl, 'payment'));
    Route::get('costo/{service}', usesas($ctrl, 'editAmount'));
    Route::post('costo', usesas($ctrl, 'updateAmount'));
    Route::get('cancelar/{service}', usesas($ctrl, 'dead'));
    Route::post('cancelar/{service}', usesas($ctrl, 'cancel'));
});

// Corporaciones
Route::group(['prefix' => 'servicios/corporaciones', 'as' => 'service.corporation.'], function () {
    $ctrl = 'CorporationServiceController';

    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{service}', usesas($ctrl, 'edit'));
    Route::post('editar/{service}', usesas($ctrl, 'update'));
    Route::get('detalles/{service}', usesas($ctrl, 'details'));
    Route::get('liberar/{service}', usesas($ctrl, 'pay'));
    Route::post('liberar/{service}', usesas($ctrl, 'change'));
    Route::get('formato/{service}', usesas($ctrl, 'printLetter'));
    Route::get('ticket/{service}', usesas($ctrl, 'printTicket'));

});

// Aseguradoras
Route::group(['prefix' => 'servicios/aseguradoras', 'as' => 'service.insurer.'], function () {
    $ctrl = 'InsurerServiceController';

    Route::get('/', usesas($ctrl, 'index'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{insurerService}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('actualizar/{insurerService}/{status}', usesas($ctrl, 'updateStatus'));
    Route::get('horas/{insurerService}', usesas($ctrl, 'editHour'));
    Route::post('horas', usesas($ctrl, 'updateHour'));
    Route::get('costo/{insurerService}', usesas($ctrl, 'editAmount'));
    Route::post('costo', usesas($ctrl, 'updateAmount'));
    Route::get('detalles/{insurerService}', usesas($ctrl, 'details'));
    Route::post('pagar', usesas($ctrl, 'pay'));
    Route::post('factura', usesas($ctrl, 'bill'));
});

// Clientes
Route::group(['prefix' => 'clientes', 'as' => 'client.'], function () {
    $ctrl = 'ClientController';

    Route::get('/', usesas($ctrl, 'show'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{id}', usesas($ctrl, 'edit'))->middleware('one');
    Route::post('editar', usesas($ctrl, 'change'));
    Route::get('detalles/{client}', usesas($ctrl, 'details'));
    Route::get('eliminar/{id}', usesas($ctrl, "deleteClient", 'delete'));
});

// Proveedores
Route::group(['prefix' => 'proveedores', 'as' => 'provider.'], function () {
    $ctrl = 'ProviderController';

    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('/', usesas($ctrl, 'show'));
    Route::get('editar/{id?}', usesas($ctrl, 'edit'))->middleware('one');
    Route::post('editar', usesas($ctrl, 'change'));
});

// Productos
Route::group(['prefix' => 'productos', 'as' => 'product.'], function () {
    $ctrl = 'ProductController';

    Route::get('/', usesas($ctrl,'show'));
    Route::get('crear', usesas($ctrl,'create'));
    Route::post('crear', usesas($ctrl,'store'));
    Route::get('editar/{id}', usesas($ctrl,'edit'))->middleware('one');
    Route::post('editar', usesas($ctrl,'change'));
});

// Precios
Route::group(['prefix' => 'precios', 'as' => 'price.'], function () {
    $ctrl = 'PriceController';

    Route::get('/', usesas($ctrl, 'show'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{price}', usesas($ctrl, 'edit'))->middleware('one');
    Route::post('editar', usesas($ctrl, 'change'));
});

// Gastos
Route::group(['prefix' => 'gastos', 'as' => 'expense.'], function () {
    $ctrl = 'ExpenseController';

    Route::get('/', usesas($ctrl, 'show'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{expense}', usesas($ctrl, 'edit'))->middleware('one');
    Route::post('editar', usesas($ctrl, 'change'));
    Route::post('formato', usesas($ctrl, 'format'));
});

// Gasolina
Route::group(['prefix' => 'gasolina', 'as' => 'gas.'], function () {
    $ctrl = 'GasController';

    Route::get('/', usesas($ctrl, 'show'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{gas}', usesas($ctrl, 'edit'))->middleware('one');
    Route::post('editar', usesas($ctrl, 'change'));
    Route::get('pagar/{gas}', usesas($ctrl, 'verify'));
    Route::get('reporte', usesas($ctrl, 'report'));
});

// Bancos
Route::group(['prefix' => 'bancos', 'as' => 'bank.'], function () {
    $ctrl = 'BankController';

    Route::get('/', usesas($ctrl, 'show'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{expense}', usesas($ctrl, 'edit'))->middleware('one');
    Route::post('editar', usesas($ctrl, 'change'));
    Route::post('actualizar', usesas($ctrl, 'update'));
    Route::post('formato', usesas($ctrl, 'format'));
});

// Facturas
Route::group(['prefix' => 'facturas', 'as' => 'invoice.'], function () {
    $ctrl = 'InvoiceController';

    Route::get('/', usesas($ctrl, 'index'));
    Route::get('crear/{insurer}', usesas($ctrl, 'create'));
    Route::get('hacer/{client}', usesas($ctrl, 'make'));
    Route::post('crear', usesas($ctrl, 'store'));
    // otro ruta para agregar facturas de clientes NO aseguradoras
    Route::post('agregar', usesas($ctrl, 'persist'));
    Route::get('editar/{expense}', usesas($ctrl, 'edit'))->middleware('one');
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('detalles/{invoice}', usesas($ctrl, 'show'));
    Route::get('pagar/{invoice}', usesas($ctrl, 'pay'));
});

// Recursos
Route::get('recursos', usesas('ResourcesController', 'show', 'resources.show'));

// Operadores
Route::group(['prefix' => 'recursos/operadores', 'as' => 'resources.driver.'], function () {
    $ctrl = 'DriverController';

    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{driver}', usesas($ctrl, 'edit'))->middleware('two');
    Route::post('editar', usesas($ctrl, 'change'));
    Route::get('extras', usesas($ctrl, 'extras'));
    // Route::post('reporte', usesas($ctrl, 'format'));
});

// Unidades
Route::group(['prefix' => 'recursos/unidades', 'as' => 'resources.unit.'], function () {
    $ctrl = 'UnitController';

    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{id}', usesas($ctrl, 'edit'))->middleware('one');
    Route::post('editar', usesas($ctrl, 'change'));
});

// Usuarios
Route::group(['prefix' => 'usuarios', 'as' => 'user.'], function () {
    $ctrl = 'UserController';

    Route::get('/', usesas($ctrl, 'index'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{user}', usesas($ctrl, 'edit'))->middleware('one');
    Route::post('editar', usesas($ctrl, 'update'));
});

// Descuentos
Route::group(['prefix' => 'extras', 'as' => 'discount.'], function () {
    $ctrl = 'DiscountController';

    Route::get('/', usesas($ctrl, 'index'));
    Route::get('crear', usesas($ctrl, 'create'));
    Route::post('crear', usesas($ctrl, 'store'));
    Route::get('editar/{discount}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
});

// OperadoreExtras
Route::group(['prefix' => 'operadoresExtras', 'as' => 'extraDrivers.'], function () {
    $ctrl = 'ExtraDriverController';

    Route::post('crear', usesas($ctrl, 'store'));
    Route::post('editar/{extraDriver}', usesas($ctrl, 'update'));
});
