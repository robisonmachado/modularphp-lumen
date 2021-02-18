<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Route;
use ModularPHP\Modulos\PMM\Semsur\Controllers\TesteController;


Route::group([
    'middleware' => 'auth:api'
], function($router)
{
    $router->get('/', function () use ($router) {

        return ["mensagem" => "API FUNCIONANDO 2"];
    });


}
);


// JWT API ROUTES
$router->get('login', AuthAPIController::class.'@login');






