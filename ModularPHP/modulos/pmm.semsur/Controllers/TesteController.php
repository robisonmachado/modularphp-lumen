<?php

namespace ModularPHP\Modulos\PMM\Semsur\Controllers;

use App\Http\Controllers\Controller;

class TesteController extends Controller
{
    function teste(){
        // renderizando view
        return view("pmm@semsur.hello", ["name" => "Robison"]);
    }
}
