<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as AuthFactory;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(AuthFactory $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //return "Autenticate Middleware";
        //dd($guard);


        if ($this->auth->guard($guard)->guest()) {
            if('session_token' === $guard) return redirect('/');
            else return response('NÃO AUTORIZADO', 401);
        }

        if(! Auth::user()){
            //dd(Auth::guard('session_token')->user());
            Auth::login( Auth::guard('session_token')->user() );
        }



        return $next($request);
    }


}
