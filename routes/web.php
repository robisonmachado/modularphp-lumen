<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Route;
//use \ModularPHP\Core\Controllers\AuthWebController;

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

Route::get('modulos/pmm/semsur/formulario_login', \ModularPHP\Core\Controllers\AuthWebController::class.'@mostrarFormularioLogin');
Route::post('modulos/pmm/semsur/login', \ModularPHP\Core\Controllers\AuthWebController::class.'@login');



// É NECESSÁRIO DECLARAR O NAMESPACE DOS CONTROLES QUE NÃO SEJAM DO NAMESPACE DEFAULT (APP/CONTROLLERS)
Route::group([
        //'namespace' => '\ModularPHP\\Modulos\PMM\Semsur',
        'prefix' => 'modulos/pmm/semsur',
        'middleware' => 'auth:session_token'
    ], function($router)
    {
        Route::get('/logout', \ModularPHP\Core\Controllers\AuthWebController::class.'@logout');
        Route::get('/dashboard', \ModularPHP\Core\Controllers\AuthWebController::class.'@dashboard');
        Route::get('/teste', \ModularPHP\Core\Controllers\AuthWebController::class.'@teste');

    }
);

