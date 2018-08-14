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

        ]
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'getout',
    ],
];
