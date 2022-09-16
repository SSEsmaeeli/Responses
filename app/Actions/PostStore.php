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
        $this->post = $this->postRepo->store($data + [
            'user_id' => auth()->user()->id
        ]);

        return $this;
    }

    public function getPost(): Post
    {
        return $this->post;
    }
}
