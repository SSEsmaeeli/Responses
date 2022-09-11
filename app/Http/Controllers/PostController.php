<?php

namespace App\Http\Controllers;

use App\Actions\PostStoreAction;
use App\Facades\Respond;
use App\Http\JsonResponses\PostResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;

class PostController extends Controller
{
    public function create()
    {
        return view('welcome');
    }

    public function store(PostStoreRequest $request, PostStoreAction $postStoreAction)
    {
        $postStoreAction->store($request->validated());

        return Respond::store($postStoreAction->getPost());
    }
}
