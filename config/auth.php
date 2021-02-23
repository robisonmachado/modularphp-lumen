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
            'provider' => 'ModularPHPUsuariosProvider',
        ],

        'session_token' => [
            'driver' => 'session_token',
            'provider' => 'ModularPHPUsuariosProvider',
            'model' => Usuario::class,
        ],

    ],

    'providers' => [
            'users' => [
                'driver' => 'ModularPHPUsuarios',
                'model' => Usuario::class,
            ],
            'ModularPHPUsuariosProvider' => [
                'driver' => 'ModularPHPUsuariosDriver',
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
