<?php

namespace App\Http\HtmlResponse;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostResponse
{
    public function index(Collection $posts): View
    {
        return view('post.index', compact('posts'));
    }

    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function store(Post $post): RedirectResponse
    {
        return redirect()->route('posts.index');
    }

    public function show(Post $post): View
    {
        return view('post.show', compact('post'));
    }

    public function update(Post $post): RedirectResponse
    {
        return redirect()->route('posts.edit', $post->uuid);
    }

    public function destroy(): RedirectResponse
    {
        return redirect()->route('posts.index');
    }
}
