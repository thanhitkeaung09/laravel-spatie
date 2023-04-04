<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testing()
    {
        return "this is testing";
    }

    public function general()
    {
        return "this is general";
    }
}
