<?php

namespace ModularPHP\Modulos\PMM\Semsur\Almoxarifado\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AlmoxarifadoController extends Controller{

    public function dashboard(){
        //dd(Auth::user());
        $idUsuario = Auth::user()->id;
        $usuario = Auth::user()->nome;
        $perm = 1;
        $foto = null;

        return view('pmm@semsur@almoxarifado::views.index');


    }

    public function formularioLoginAlmoxarifado(){
        return view('pmm@semsur@almoxarifado::login');
    }
}
