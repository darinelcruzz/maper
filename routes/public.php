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

    // General
    Route::group(['prefix' => 'servicios/general', 'as' => 'service.general.'], function () {
        Route::get('crear', [
            'uses' => 'GeneralServiceController@create',
            'as' => 'create'
        ]);

        Route::post('crear', [
            'uses' => 'GeneralServiceController@store',
            'as' => 'store'
        ]);


        Route::get('editar/{service}', [
            'uses' => 'GeneralServiceController@edit',
            'as' => 'edit'
        ]);

        Route::get('eliminar/{id}', [
            'uses' => 'GeneralServiceController@deleteClient',
            'as' => 'delete'
        ]);

        Route::post('cambiar', [
            'uses' => 'GeneralServiceController@change',
            'as' => 'change'
        ]);

        Route::get('detalles/{service}', [
            'uses' => 'GeneralServiceController@details',
            'as' => 'details'
        ]);

        Route::get('pago/{service}', [
            'uses' => 'GeneralServiceController@pay',
            'as' => 'pay'
        ]);

        Route::post('pago', [
            'uses' => 'GeneralServiceController@change',
            'as' => 'setPayMethod'
        ]);

        Route::get('cancelar/{service}', [
            'uses' => 'GeneralServiceController@cancel',
            'as' => 'cancel'
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


        Route::get('editar/{service}', [
            'uses' => 'CorporationServiceController@edit',
            'as' => 'edit'
        ]);

        Route::get('eliminar/{id}', [
            'uses' => 'CorporationServiceController@deleteClient',
            'as' => 'delete'
        ]);

        Route::post('cambiar', [
            'uses' => 'CorporationServiceController@update',
            'as' => 'update'
        ]);

        Route::get('detalles/{service}', [
            'uses' => 'CorporationServiceController@details',
            'as' => 'details'
        ]);

        Route::get('pago/{service}', [
            'uses' => 'CorporationServiceController@pay',
            'as' => 'pay'
        ]);

        Route::get('formato/{service}', [
            'uses' => 'CorporationServiceController@printLetter',
            'as' => 'print'
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

    Route::get('detalles/{client}', [
        'uses' => 'ClientController@details',
        'as' => 'details'
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

// Precios
Route::group(['prefix' => 'precios', 'as' => 'price.'], function () {
    Route::get('crear', [
        'uses' => 'PriceController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'PriceController@store',
        'as' => 'store'
    ]);

    Route::get('/lista', [
        'uses' => 'PriceController@show',
        'as' => 'show'
    ]);

    Route::get('editar/{price}', [
        'uses' => 'PriceController@edit',
        'as' => 'edit'
    ]);

    Route::post('cambiar', [
        'uses' => 'PriceController@change',
        'as' => 'change'
    ]);
});

// Gastos
Route::group(['prefix' => 'gastos', 'as' => 'expense.'], function () {
    Route::get('crear', [
        'uses' => 'ExpenseController@create',
        'as' => 'create'
    ]);

    Route::post('crear', [
        'uses' => 'ExpenseController@store',
        'as' => 'store'
    ]);

    Route::get('/lista', [
        'uses' => 'ExpenseController@show',
        'as' => 'show'
    ]);

    Route::get('editar/{expense}', [
        'uses' => 'ExpenseController@edit',
        'as' => 'edit'
    ]);

    Route::post('cambiar', [
        'uses' => 'ExpenseController@change',
        'as' => 'change'
    ]);

    Route::post('formato', [
        'uses' => 'ExpenseController@format',
        'as' => 'format'
    ]);
});

// Recursos
Route::get('recursos', [
    'uses' => 'ResourcesController@show',
    'as' => 'resources.show'
]);
    // Operadores
    Route::group(['prefix' => 'recursos/operadores', 'as' => 'resources.driver.'], function () {
        Route::get('crear', [
            'uses' => 'DriverController@create',
            'as' => 'create'
        ]);

        Route::post('crear', [
            'uses' => 'DriverController@store',
            'as' => 'store'
        ]);

        Route::get('editar/{driver}', [
            'uses' => 'DriverController@edit',
            'as' => 'edit'
        ]);

        Route::post('cambiar', [
            'uses' => 'DriverController@change',
            'as' => 'change'
        ]);

        Route::get('fecha', [
            'uses' => 'DriverController@date',
            'as' => 'date'
        ]);

        Route::post('reporte', [
            'uses' => 'DriverController@format',
            'as' => 'format'
        ]);
    });

    // Unidades
    Route::group(['prefix' => 'recursos/unidades', 'as' => 'resources.unit.'], function () {
        Route::get('crear', [
            'uses' => 'UnitController@create',
            'as' => 'create'
        ]);

        Route::post('crear', [
            'uses' => 'UnitController@store',
            'as' => 'store'
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

    Route::get('', [
        'uses' => 'UserController@show',
        'as' => 'show'
    ]);
});



Route::get('/', function () {
    return view('welcome');
})->name('home');
