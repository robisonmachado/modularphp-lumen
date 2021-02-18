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
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        /* return json_encode([
            "action" => "login",
            "data" => $request->all(),
        ]); */

        $credenciais = $request->only(['cpf', 'senha']);

        //return var_dump(auth('api')->attempt($credenciais));

        $user = Usuario::where('cpf', $request->input('cpf'))->first();
        //dd($user);


        /* if (Hash::check($credenciais['senha'], $bdSenha)) {
            $teste = "senhas conferem";
        } */

        $token = auth('api')->attempt([
            "cpf" => $credenciais['cpf'],
            "senha" => $credenciais['senha'],
        ]);
        if (! $token) {
            return response()->json([
                'error' => 'Unauthorized',
                'token' => $token,
                'request' => $request->all(),
            ], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
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
        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
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
