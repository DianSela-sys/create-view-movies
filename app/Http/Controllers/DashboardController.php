<?php

namespace App\Http\Controllers;

use illuminate\Http\Request;

class DashboardController extends Controller {
    function home()
    {
        return view('dashboard.home');
    }
}