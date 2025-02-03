<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.home');
    }

    public function pricing()
    {
        return view('home.pricing');
    }

    public function test()
    {
        return view('auth.auth');
    }
}
