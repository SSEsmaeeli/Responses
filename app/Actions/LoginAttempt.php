<?php

namespace App\Actions;

use App\Facades\LoginResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginAttempt
{
    private array $credentials;

    public function handle(): RedirectResponse|JsonResponse
    {
        if(Auth::attempt($this->credentials)) {
            return $this->authenticated();
        }

        return $this->failedLoginAttempt();
    }

    public function setCredentials(array $credentials): static
    {
        $this->credentials = $credentials;
        return $this;
    }

    private function authenticated(): RedirectResponse|JsonResponse
    {
        return LoginResponse::success();
    }

    private function failedLoginAttempt(): RedirectResponse|JsonResponse
    {
        return LoginResponse::failed();
    }
}
