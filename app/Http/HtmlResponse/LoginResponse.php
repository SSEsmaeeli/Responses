<?php

namespace App\Http\HtmlResponse;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;

class LoginResponse
{
    public function success(): RedirectResponse
    {
        request()->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function failed(): RedirectResponse
    {
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
