<?php

namespace App\Actions;

use App\Models\Post;
use App\Repos\PostRepo;

class PostStore
{
    private Post $post;

    public function __construct(private readonly PostRepo $postRepo)
    {
    }

    public function store($data): static
    {
        $post = $this->postRepo->store($data + [
            'user_id' => auth()->user()->id,
        ]);

        $this->post = $post->refresh();

        return $this;
    }

    public function getPost(): Post
    {
        return $this->post;
    }
}
