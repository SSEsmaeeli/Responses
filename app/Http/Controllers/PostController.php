<?php

namespace App\Http\Controllers;

use App\Actions\PostStore;
use App\Facades\PostResponse;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{
    public function create(): View
    {
        return view('welcome');
    }

    public function store(PostStoreRequest $request, PostStore $postStoreAction)
    {
        $postStoreAction->store($request->validated());

        return PostResponse::store($postStoreAction->getPost());
    }
}
