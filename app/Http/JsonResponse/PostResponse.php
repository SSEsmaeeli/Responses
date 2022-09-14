<?php

namespace App\Http\JsonResponse;

use App\Http\Resources\Post as PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostResponse
{
    public function store(Post $post): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => new PostResource($post),
        ]);
    }
}
