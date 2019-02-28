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

    'cash' => [
        'title' => 'Concentrado',
        'icon' => 'fa  fa-list-ul',
        'route' => 'admin.cash',
    ],

    'admin' => [
        'title' => 'Administración',
        'icon' => 'fa fa-line-chart',
        'submenu' => [
            'expenses' => [
                'title' => 'Caja Chica',
                'route' => 'expense.create'
            ],
            'bank' => [
                'title' => 'Banco',
                'route' => 'bank.create'
            ],
            'gas' => [
                'title' => 'Gasolina',
                'route' => 'gas.create'
            ],
            'report' => [
                'title' => 'Corte',
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
            // 'extras' => [
            //     'title' => 'HorasExtras',
            //     'route' => 'resources.driver.extras'
            // ],
            'discounts' => [
                'title' => 'Descuentos',
                'route' => 'discount.index'
            ],
        ]
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
