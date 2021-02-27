<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Support\Facades\Route;
use ModularPHP\Modulos\PMM\Semsur\Almoxarifado\Controllers\AlmoxarifadoController;
use ModularPHP\Modulos\PMM\Semsur\Controllers\DashboardSemsurController;

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

Route::get('/teste', function (){
    return view("teste-mix");
});


Route::get('/', \ModularPHP\Core\Controllers\AuthWebController::class.'@mostrarFormularioLogin');
Route::post('/login', \ModularPHP\Core\Controllers\AuthWebController::class.'@login');
Route::get('/formulario-login-almoxarifado', AlmoxarifadoController::class.'@formularioLoginAlmoxarifado');

Route::group([
    'middleware' => ['auth:session_token']
], function($router)
{
    Route::get('public/dashboard-html/public/index.html', function (){
        dd('dash');
        //return redirect('/dashboard-html/public/');
    });

    Route::get('/logout', \ModularPHP\Core\Controllers\AuthWebController::class.'@logout');

    Route::get('/dashboard', DashboardSemsurController::class.'@index');
    Route::get('/dashboard/forms', DashboardSemsurController::class.'@forms');





});





// É NECESSÁRIO DECLARAR O NAMESPACE DOS CONTROLES QUE NÃO SEJAM DO NAMESPACE DEFAULT (APP/CONTROLLERS)
Route::group([
        'middleware' => 'auth:session_token'
    ], function($router)
    {
        //Route::get('/dashboard', \ModularPHP\Core\Controllers\AuthWebController::class.'@dashboard');
        //Route::get('/teste', \ModularPHP\Core\Controllers\AuthWebController::class.'@teste');

    }
);

