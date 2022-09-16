<?php

namespace App\Facades;

use App\Http\HtmlResponse\LogoutResponse as HtmlLoginResponse;
use App\Http\JsonResponse\LogoutResponse as JsonLoginResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static success()
 */
class LogoutResponse extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        if (request()->expectsJson()) {
            return JsonLoginResponse::class;
        }

        return HtmlLoginResponse::class;
    }
}
