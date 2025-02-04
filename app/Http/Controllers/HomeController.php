<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.home');
    }

    public function pricing()
    {
        $plans = Plan::all();
        return view('home.pricing', compact('plans'));
    }

    public function test()
    {
        return view('home.success');
    }
}
