<?php

namespace ModularPHP\Core\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ModularPHPAuthUserProvider extends EloquentUserProvider
{
   public function validateCredentials(UserContract $user, array $credenciais)
   {
       $senha = $credenciais['senha'];

       return $this->hasher->check($senha, $user->getAuthPassword());

       /* if (Hash::check($senha, $user->senha)){
           return true;
       } else {
           return false;
       } */


       // caso queira continuar autenticando pelo modo padrao do Laravel
       // ou seja, validar dos dois modos, utilize a linha de codigo abaixo
       // return parent::validateCredentials($user, $credentials);
   }

   /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials) ||
           (count($credentials) === 1 &&
            Str::contains($this->firstCredentialKey($credentials), 'senha'))) {
            return;
        }

        // First we will add each credential element to the query as a where clause.
        // Then we can execute the query and, if we found a user, return it in a
        // Eloquent User "model" that will be utilized by the Guard instances.
        $query = $this->newModelQuery();

        foreach ($credentials as $key => $value) {
            if (Str::contains($key, 'senha')) {
                continue;
            }

            if (is_array($value) || $value instanceof Arrayable) {
                $query->whereIn($key, $value);
            } else {
                $query->where($key, $value);
            }
        }

        return $query->first();
    }

}
