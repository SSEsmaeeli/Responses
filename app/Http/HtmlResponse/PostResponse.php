<?php

namespace App\Http\HtmlResponse;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostResponse
{
    /**
     * @param  Post  $post
     * @return View
     */
    public function store(Post $post): View
    {
        return view('welcome', [
            'post' => $post,
        ]);
    }
}
