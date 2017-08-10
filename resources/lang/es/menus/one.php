<?php

return [

    'service' => [
        'title' => 'Servicios',
        'icon' => 'fa fa-ambulance',
        'submenu' => [
            'public' => [
                'title' => 'Publico General',
                'route' => 'service.public.create'
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

    'units' => [
        'title' => 'Unidades',
        'icon' => 'fa fa-truck',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'unit.create'
            ],
            'list' => [
                'title' => 'Listado',
                'route' => 'unit.show'
            ],
        ]
    ],

    'drivers' => [
        'title' => 'Operadores',
        'icon' => 'fa fa-id-card-o',
        'submenu' => [
            'create' => [
                'title' => 'Agregar',
                'route' => 'driver.create'
            ],
            'list' => [
                'title' => 'Listado',
                'route' => 'driver.show'
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
