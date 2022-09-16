<?php

namespace App\Http\HtmlResponse;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class PostResponse
{
    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function store(Post $post): RedirectResponse
    {
        return redirect()->route('posts.index');
    }
}
