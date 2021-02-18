<?php

namespace ModularPHP\Core\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ModularPHP\Core\Models\Usuario;

class UsuarioController extends Controller
{
    public function create(Request $request)
    {

        Usuario::insert($request);

        return [
            "status" => "OK",
            "mensagem" => "usuário inserido com sucesso!"
        ];
    }

    public function show(Request $request)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }
}
