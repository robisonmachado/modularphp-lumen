<?php

namespace App\Providers;

//use App\Models\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use ModularPHP\Core\Models\Usuario;
use ModularPHP\Core\Providers\ModularPHPAuthUserProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        /* $this->app['auth']->viaRequest('api', function ($request) {

            $user = Usuario::where('cpf', $request->input('cpf'))->first();
            return $user;

            //if ($request->input('api_token')) {
            //    return User::where('api_token', $request->input('api_token'))->first();
            //}

        }); */

        Auth::provider('ModularPHPUsuarios', function ($app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            $provider = $app->make(ModularPHPAuthUserProvider::class, ['model' => $config['model']]);

            return $provider;
        });

    }
}
