<?php

return [
    'home' => [
        'title' => 'Menu',
        'icon' => 'fa fa-truck',
        'submenu' => [
            'subhome1' => [
                'title' => 'Submenu 1',
                'route' => 'home'
            ],
            'subhome2' => [
                'title' => 'Submenu 2',
                'route' => 'home'
            ],
        ]
    ],

    'logout' => [
        'title' => 'Cerrar Sesión',
        'icon' => 'fa fa-sign-out',
        'route' => 'home',
    ],
];
