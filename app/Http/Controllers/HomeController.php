<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;

class HomeController extends Controller
{
    public function show()
    {
        return view('welcome');
    }
}
