<?php

namespace App\Http\Controllers;

use App\Actions\PostStore;
use App\Actions\PostUpdate;
use App\Facades\PostResponse;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repos\PostRepo;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index(PostRepo $postRepo): View
    {
        $posts = $postRepo->getUserPosts(auth()->user()->id);

        return PostResponse::index($posts);
    }

    public function create(): View
    {
        return view('post.create');
    }

    public function store(PostStoreRequest $request, PostStore $postStoreAction)
    {
        $postStoreAction->store($request->validated());

        return PostResponse::store($postStoreAction->getPost());
    }

    public function edit($postUuid, PostRepo $postRepo): View
    {
        $post = $postRepo->findByUUID($postUuid);
        return view('post.edit', compact('post'));
    }

    public function update(PostUpdateRequest $request, $postId, PostUpdate $postUpdate)
    {
        $postUpdate->setPostId($postId)
            ->setData($request->validated())
            ->handle();

        return PostResponse::update($postUpdate->getPost());
    }
}
