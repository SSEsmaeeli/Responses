<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static failedAuthorization(string $string)
 * @method static failedAuthentication(string $string)
 * @method static success(mixed $data)
 * @method static failed($message, $status = 400)
 * @method static failedNotFound(string $string)
 * @method static failedValidation(string $string)
 */
class Respond extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'App\Helpers\ApiResponse';
    }
}
