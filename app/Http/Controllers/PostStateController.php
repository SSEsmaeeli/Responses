<?php

namespace App\Http\Controllers;

use App\Actions\PostUpdate;
use App\Facades\PostResponse;
use App\Http\Requests\PostStateUpdateRequest;
use App\Models\Post;

class PostStateController extends Controller
{
    public function update(PostStateUpdateRequest $request, Post $post, PostUpdate $postUpdate)
    {
        $this->authorize('stateUpdate', $post);

        $postUpdate
            ->setPostUuid($post->uuid)
            ->setData($request->validated())
            ->handle();

        return PostResponse::updateState($postUpdate->getPost());
    }
}
