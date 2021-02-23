<?php

namespace ModularPHP\Core\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use ModularPHP\Core\Models\Usuario;
use Tymon\JWTAuth\JWTAuth;

class AuthAPIController extends Controller
{
    protected $jwtAuth;
    public function __construct(JWTAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
        $this->middleware('auth:api', ['except' => ['login', 'refresh']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $credenciais = $request->only(['cpf', 'senha']);

        //return var_dump(auth('api')->attempt($credenciais));

        $token = Auth::attempt($credenciais);
        if (! $token) {
            return response()->json([
                'error' => 'NÃO AUTORIZADO',
                'token' => $token,
                'request' => $request->all(),
            ], 401);
        }

        //return Auth::user()->update(['access_token' => $token]);

        Auth::user()->access_token = $token;
        Auth::user()->save();

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function usuario()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::user()->access_token = null;
        Auth::user()->save();

        Auth::logout();

        return response()->json(['mensagem' => 'DESLOGADO COM SUCESSO']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $token = null;

        try {
            $token = Auth::refresh();
        } catch (\Throwable $th) {
            return response()->json(['mensagem' => 'NÃO AUTORIZADO'], 401);
        }

        auth()->user()->access_token = $token;
        auth()->user()->save();

        return $this->respondWithToken($token);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ]);
    }
}
