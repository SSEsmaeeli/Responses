<?php

namespace App\Http\Controllers;

use App\Actions\LoginAttempt;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('login');
    }

    public function login(LoginRequest $request, LoginAttempt $loginAttempt): View|RedirectResponse
    {
        return $loginAttempt
            ->setCredentials($request->validated())
            ->handle();
    }
}
