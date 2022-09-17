<?php

namespace App\Http\Controllers;

use App\Actions\PostDestroy;
use App\Actions\PostStore;
use App\Actions\PostUpdate;
use App\Contracts\PostRepoInterface;
use App\Events\PostUpdated;
use App\Facades\PostResponse;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Repos\PostRepo;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(PostRepoInterface $postRepo): View
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

    public function show(Post $post)
    {
        return PostResponse::show($post);
    }

    public function edit(Post $post): View
    {
        return view('post.edit', compact('post'));
    }

    public function update(PostUpdateRequest $request, Post $post, PostUpdate $postUpdate)
    {
        $postUpdate->setPostUuid($post->uuid)
            ->setData($request->validated())
            ->handle();

        event(new PostUpdated($postUpdate->getPost()));

        return PostResponse::update($postUpdate->getPost());
    }

    public function destroy(Post $post, PostDestroy $postDestroy)
    {
        $postDestroy
            ->setPostUuid($post->uuid)
            ->handle();

        return PostResponse::destroy();
    }
}
