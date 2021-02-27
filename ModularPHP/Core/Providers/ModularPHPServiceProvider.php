<?php

namespace ModularPHP\Core\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class ModularPHPServiceProvider extends ServiceProvider
{
    static function ehModulo($modulo): bool{
        //echo MODULOS_DIR . DS . $modulo;
         return
             //file_exists(MODULOS_DIR .$modulo.'/unisystem.modulo.json') &&
             //file_exists(MODULOS_DIR .$modulo.'/rotas.web.php') &&
             //file_exists(MODULOS_DIR .$modulo.'/rotas.api.php') &&
             file_exists(MODULARPHP_PASTA_MODULOS. DS. $modulo.'/Models') &&
             file_exists(MODULARPHP_PASTA_MODULOS. DS. $modulo.'/Controllers') &&
             file_exists(MODULARPHP_PASTA_MODULOS. DS. $modulo.'/Views') &&
             file_exists(MODULARPHP_PASTA_MODULOS. DS. $modulo.'/Migrations') &&
             file_exists(MODULARPHP_PASTA_MODULOS. DS. $modulo.'/Middlewares') &&
             file_exists(MODULARPHP_PASTA_MODULOS. DS. $modulo.'/Providers');

     }

    static function obterModulos(): ?array{

        if(is_dir(MODULARPHP_PASTA_MODULOS)){
            $modulos = array_values(
                            array_filter(
                                scandir(MODULARPHP_PASTA_MODULOS), 'self::ehModulo'
                                )
                            );
            //dd($modulos);
            return $modulos;


        }

        return null;
    }

    static function nomeModuloParaNamespaceView(string $nomeModulo){
        return str_replace('.', '@', $nomeModulo);
    }



    public function boot()
    {
        foreach($this->obterModulos() as $modulo){
            //dd(self::nomeModuloParaNamespaceView($modulo));
            $this->loadViewsFrom(MODULARPHP_PASTA_MODULOS.DS.$modulo.DS.'Views', self::nomeModuloParaNamespaceView($modulo));
        }


    }

}
