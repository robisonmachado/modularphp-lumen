<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use ModularPHP\Modulos\PMM\Semsur\Controllers\TesteController;


Route::group([
    'middleware' => 'auth:api'
], function($router)
{
    $router->get('/', function () use ($router) {

        return [
            "mensagem" => "API FUNCIONANDO",
            "Usuário" => Auth::user()
        ];
    });


}
);


// JWT API ROUTES
$router->get('login', AuthAPIController::class.'@login');
$router->get('refresh', AuthAPIController::class.'@refresh');
$router->get('logout', AuthAPIController::class.'@logout');






