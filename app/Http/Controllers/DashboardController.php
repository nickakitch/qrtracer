<?php

namespace App\Http\Controllers;

use DateTimeZone;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        return view('dashboard.index', [
            'timezones' => DateTimeZone::listIdentifiers()
        ]);
    }
}
