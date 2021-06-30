<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends MyController
{
    public function optIn()
    {
        return view('home.optin');
    }
}
