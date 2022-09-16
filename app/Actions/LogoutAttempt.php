<?php

namespace App\Actions;

use App\Facades\LogoutResponse;

class LogoutAttempt
{
    public function handle()
    {
        LogoutResponse::success();
    }
}
