<?php

namespace App\Http\JsonResponse;

use App\Facades\Respond;
use Illuminate\Http\RedirectResponse;

class LogoutResponse
{
    public function success(): RedirectResponse
    {
        request()->user()->currentAccessToken()->delete();

        Respond::success('You are Logged out successfully');
    }
}
