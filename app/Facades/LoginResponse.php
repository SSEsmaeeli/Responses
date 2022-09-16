<?php

namespace App\Facades;

use App\Http\HtmlResponse\LoginResponse as HtmlLoginResponse;
use App\Http\JsonResponse\LoginResponse as JsonLoginResponse;
use Illuminate\Support\Facades\Facade;

/**
 * @method static success()
 * @method static failed()
 */
class LoginResponse extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        if (request()->expectsJson()) {
            return JsonLoginResponse::class;
        }

        return HtmlLoginResponse::class;
    }
}
