<?php

namespace App\Http\HtmlResponse;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginResponse
{
    public function success(): RedirectResponse
    {
        request()->session()->regenerate();

        return redirect()->intended('dashboard');
    }

    public function failed(): RedirectResponse
    {
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
