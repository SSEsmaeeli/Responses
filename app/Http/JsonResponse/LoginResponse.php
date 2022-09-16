<?php

namespace App\Http\JsonResponse;

use App\Facades\Respond;
use Illuminate\Http\JsonResponse;

class LoginResponse
{
    public function success(): JsonResponse
    {
        Respond::success([
            'message' => 'You are successfully logged in!',
            'user' => auth()->user()
        ]);
    }

    public function failed(): JsonResponse
    {
        Respond::failed('The provided credentials do not match our records.');
    }
}
