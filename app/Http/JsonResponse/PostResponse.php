<?php

namespace App\Http\JsonResponse;

use App\Facades\Respond;
use App\Http\Resources\Post as PostResource;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class PostResponse
{
    public function index(Collection $posts): JsonResponse
    {
        Respond::success($posts);
    }

    public function store(Post $post): JsonResponse
    {
        Respond::success(
            new PostResource($post)
        );
    }

    public function update(Post $post): JsonResponse
    {
        Respond::success(
            new PostResource($post)
        );
    }
}
