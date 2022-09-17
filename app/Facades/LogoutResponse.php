<?php

namespace App\Facades;

use App\Http\HtmlResponse\LogoutResponse as HtmlLogoutResponse;
use App\Http\JsonResponse\LogoutResponse as JsonLogoutResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static success()
 */
class LogoutResponse extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        if (request()->expectsJson()) {
            return JsonLogoutResponse::class;
        }

        return HtmlLogoutResponse::class;
    }
}
