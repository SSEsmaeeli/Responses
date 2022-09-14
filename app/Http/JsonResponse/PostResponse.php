<?php

namespace App\Http\JsonResponse;

use App\Models\Post;
use App\Http\Resources\Post as PostResource;
use Illuminate\Http\JsonResponse;

class PostResponse
{
    public function store(Post $post): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => new PostResource($post)
        ]);
    }
}
