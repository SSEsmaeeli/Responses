<?php

namespace App\Http\Controllers;

use App\Actions\PostStore;
use App\Facades\PostResponse;
use App\Http\Requests\PostStoreRequest;

class PostController extends Controller
{
    public function create()
    {
        return view('welcome');
    }

    public function store(PostStoreRequest $request, PostStore $postStoreAction)
    {
        $postStoreAction->store($request->validated());

//        return PostStoreRespond::show($postStoreAction->getPost());
        return PostResponse::store($postStoreAction->getPost());
    }

    public function show()
    {
//        PostShowRespond::show();
        PostResponse::show();
    }
}
