<?php

namespace Modulos\PMM\Semsur\Controllers;

use App\Http\Controllers\Controller;

class TesteController extends Controller
{
    function teste(){
        return view('pmm@semsur/hello', ["name" => "Robison"]);
    }
}
