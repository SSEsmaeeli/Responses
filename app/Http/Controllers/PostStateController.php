<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStateUpdateRequest;
use App\Models\Post;

class PostStateController extends Controller
{
    public function update(PostStateUpdateRequest $request, Post $post)
    {
        $this->authorize('stateUpdate', $post);

        return 'done!';
        // @todos:
        // 1- check roles
        // 2- check actions
        // 3- update
    }
}
