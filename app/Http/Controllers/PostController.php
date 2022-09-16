<?php

namespace App\Http\Controllers;

use App\Actions\PostStore;
use App\Facades\PostResponse;
use App\Http\Requests\PostStoreRequest;
use App\Repos\PostRepo;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function index(PostRepo $postRepo): View
    {
        $posts = $postRepo->getUserPosts(auth()->user()->id);

        PostResponse::index($posts);
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
}
