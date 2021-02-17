<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Route;
use ModularPHP\Modulos\PMM\Semsur\Controllers\TesteController;

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

// JWT API ROUTES
$router->get('api/login', function () use ($router) {
    return ["status" => "accepted"];
});

Route::group([
    'prefix' => 'api',
    'middleware' => 'auth'
], function($router)
    {



    }
);




// É NECESSÁRIO DECLARAR O NAMESPACE DOS CONTROLES QUE NÃO SEJAM DO NAMESPACE DEFAULT (APP/CONTROLLERS)
Route::group([
        'namespace' => '\ModularPHP\\Modulos\PMM\Semsur',
        'prefix' => 'modulos/pmm/semsur'
    ], function($router)
    {
        $router->get('/login', \Controllers\TesteController::class.'@teste');

    }
);

