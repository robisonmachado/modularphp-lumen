<?php
namespace ModularPHP\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Laravel\Lumen\Auth\Authorizable;



class Usuario extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable, HasFactory;

    public $table = "ModularPHP@Usuarios";

    protected $fillable = [
        'nome', 'senha', 'cpf','matricula', 'email', 'telefone1', 'telefone2', 'país',
        'uf', 'cidade', 'localidade', 'logradouro', 'cep'
    ];

    protected $hidden = ['senha', 'remember_token',];

    public function getAuthPassword()
    {
        return $this->senha;
    }

    /* public function getAuthIdentifierName()
    {
        return 'cpf';
    } */


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


}
