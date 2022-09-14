<?php

namespace App\Http\JsonResponse;

use App\Facades\Respond;
use App\Http\Resources\Post as PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostResponse
{
    public function store(Post $post): JsonResponse
    {
        Respond::success(
            new PostResource($post)
        );
    }
}
