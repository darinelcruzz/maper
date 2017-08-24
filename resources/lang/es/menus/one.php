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
            'create' => [
                'title' => 'Caja',
                'route' => 'admin.cash'
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
            'createu' => [
                'title' => 'Agregar unidad',
                'route' => 'unit.create'
            ],
            'created' => [
                'title' => 'Agregar operador',
                'route' => 'driver.create'
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
                'route' => 'user.show'
            ],
        ]
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
