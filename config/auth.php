<?php

use App\Models\User;
use ModularPHP\Core\Models\Usuario;

return [

    'defaults' => [
        'guard' => 'api',
        //'passwords' => 'users',
        //'passwords' => 'ModularPHPUsuarios',
    ],



    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],

    ],

    'providers' => [
            'users' => [
                'driver' => 'ModularPHPUsuarios',
                'model' => Usuario::class,
            ],

    ],

    /* 'passwords' => [
        'ModularPHPSenhasUsuarios' => [
            'provider' => 'ModularPHPUsuarios',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ], */
];
