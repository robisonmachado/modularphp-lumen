<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Route;
use Modulos\PMM\Semsur\Controllers\TesteController;

//use Modulos\PMM\Semsur\Controllers\TesteController;

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

$router->get('/', function () use ($router) {
    $teste = new TesteController;
    print_r($teste);
    //return $router->app->version();
});



// É NECESSÁRIO DECLARAR O NAMESPACE DOS CONTROLES QUE NÃO SEJAM DO NAMESPACE DEFAULT (APP/CONTROLLERS)
Route::group(['namespace' => '\Modulos\PMM\Semsur\Controllers'], function($router)
{
    $router->get('/teste', \TesteController::class.'@teste');

});


Route::group(['namespace' => '\Modulos\PMM\Semsur', 'prefix' => 'modulos/pmm/semsur'], function($router)
{
    $router->get('/login', \Controllers\TesteController::class.'@teste');

});

