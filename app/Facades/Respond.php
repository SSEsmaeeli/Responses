<?php

namespace App\Facades;

use App\Http\JsonResponses\PostResponse as JsonPostResponse;
use App\Http\HtmlReponses\PostResponse as HtmlPostResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;

/**
 * @method static store(Model $post)
 */
class Respond extends Facade
{
    protected static function getFacadeAccessor()
    {
        if(request()->expectsJson()) {
            return JsonPostResponse::class;
        }

        return HtmlPostResponse::class;
    }

}
