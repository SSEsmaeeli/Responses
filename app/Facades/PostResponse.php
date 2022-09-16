<?php

namespace App\Facades;

use App\Http\HtmlResponse\PostResponse as HtmlPostResponse;
use App\Http\JsonResponse\PostResponse as JsonPostResponse;
use App\Models\Post;
use Illuminate\Support\Facades\Facade;

/**
 * @method static store(Post $post)
 * @method static index(\Illuminate\Database\Eloquent\Collection $posts)
 * @method static update($getPost)
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
