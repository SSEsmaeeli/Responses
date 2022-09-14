<?php

namespace App\Facades;

use App\Http\HtmlReponse\PostResponse as HtmlPostResponse;
use App\Http\JsonResponse\PostResponse as JsonPostResponse;
use App\Models\Post;
use Illuminate\Support\Facades\Facade;

/**
 * @method static store(Post $post)
 */
class PostResponse extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        if (request()->expectsJson()) {
            return JsonPostResponse::class;
        }

        return HtmlPostResponse::class;
    }
}
