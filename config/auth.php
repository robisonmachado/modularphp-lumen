<?php

use ModularPHP\Core\Models\Usuario;

return [

    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],



    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => Usuario::class,
        ],

    ]
];
