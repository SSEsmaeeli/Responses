<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {

    }
}
