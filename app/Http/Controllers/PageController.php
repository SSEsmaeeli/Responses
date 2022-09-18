<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function showWelcomePage(): View
    {
        return view('welcome');
    }

    public function showHomePage()
    {
        return view('home');
    }
}
