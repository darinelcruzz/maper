<?php

return [

    'service' => [
        'title' => 'Servicios',
        'icon' => 'fa fa-ambulance',
        'submenu' => [
            'general' => [
                'title' => 'General',
                'route' => 'service.general.create'
            ],
            'corporation' => [
                'title' => 'Coorporaciones',
                'route' => 'service.corporation.create'
            ],
            'insurers' => [
                'title' => 'Aseguradoras',
                'route' => 'service.insurer.create'
            ],
            'list' => [
                'title' => 'Listado',
                'route' => 'service.show'
            ],
        ]
    ],

    'admin' => [
        'title' => 'Administración',
        'icon' => 'fa fa-line-chart',
        'submenu' => [
            'cash' => [
                'title' => 'Concentrado',
                'route' => 'admin.cash'
            ],
            'expenses' => [
                'title' => 'Caja Chica',
                'route' => 'expense.create'
            ],
            'bank' => [
                'title' => 'Banco',
                'route' => 'bank.create'
            ],
            'report' => [
                'title' => 'Reporte',
                'route' => 'admin.search'
            ],
        ]
    ],

    'insurers' => [
        'title' => 'Aseguradoras',
        'icon' => 'fa fa-briefcase',
        'submenu' => [
            'index' => [
                'title' => 'Lista',
                'route' => 'insurer.index'
            ],
            'create' => [
                'title' => 'Agregar',
                'route' => 'insurer.create'
            ],
        ]
    ],

    'clients' => [
        'title' => 'Clientes',
        'icon' => 'fa fa-users',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'client.create'
            ],
            'list' => [
                'title' => 'Listado',
                'route' => 'client.show'
            ],
        ]
    ],

    'providers' => [
        'title' => 'Proveedores',
        'icon' => 'fa fa-handshake-o',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'provider.create'
            ],
            'list' => [
                'title' => 'Listado',
                'route' => 'provider.show'
            ],
        ]
    ],

    'prices' => [
        'title' => 'Precios',
        'icon' => 'fa fa-dollar',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'price.create'
            ],
            'list' => [
                'title' => 'Listado',
                'route' => 'price.show'
            ],
        ]
    ],

    'resources' => [
        'title' => 'Recursos',
        'icon' => 'fa fa-truck',
        'submenu' => [
            'list' => [
                'title' => 'Listado',
                'route' => 'resources.show'
            ],
            'extras' => [
                'title' => 'Pagos',
                'route' => 'resources.driver.date'
            ],
            'discounts' => [
                'title' => 'Descuentos',
                'route' => 'discount.index'
            ],
        ]
    ],

    'users' => [
        'title' => 'Usuarios',
        'icon' => 'fa fa-key',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'user.create'
            ],
            'list' => [
                'title' => 'Listado',
                'route' => 'user.index'
            ],
        ]
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
