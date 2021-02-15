<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Route;
use ModularPHP\Modulos\PMM\Semsur\Controllers\TesteController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', ['middleware' => 'auth:api'], function () use ($router) {
    $teste = new TesteController;
    print_r($teste);
    //return $router->app->version();
});




