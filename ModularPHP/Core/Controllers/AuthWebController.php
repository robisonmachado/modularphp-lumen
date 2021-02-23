<?php

namespace ModularPHP\Core\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthWebController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        session()->flush();
        $credenciais = $request->only('cpf', 'senha');

        $token = Auth::attempt($credenciais);
        if($token){
            $request->session()->regenerate();
            Auth::user()->access_token = $token;
            Auth::user()->save();
            session([
                'access_token' => $token,
                ]);
            return redirect('/modulos/pmm/semsur/dashboard');
        }else{
            return response()->json(['mensagem' => 'ERRO AO FAZER LOGIN']);
        }
    }

    public function mostrarFormularioLogin(){
        return view('pmm@semsur.formulario_login');
    }

    public function dashboard(){
        return view('pmm@semsur.dashboard');
    }

    public function teste(){
        //return response()->json(session()->all());
        //$usuario = session('usuario');
        return view('pmm@semsur.teste');
    }

    public function logout(){
        //return response()->json(session()->all());
        //$usuario = session('usuario');
        dd(Auth::user());
        session()->flush();
        Auth::logout();

        return redirect('/modulos/pmm/semsur/formulario_login');
    }


}
