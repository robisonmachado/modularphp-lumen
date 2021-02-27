<?php

namespace ModularPHP\Modulos\PMM\Semsur\Controllers;

use App\Http\Controllers\Controller;

class DashboardSemsurController extends Controller
{
    function index(){
        return view("pmm@semsur::dashboard.index");
    }

    function forms(){
        return view("pmm@semsur::dashboard.forms");
    }
}
