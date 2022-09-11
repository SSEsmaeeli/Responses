<?php

namespace App\Repos;

use App\Models\Post;

class PostRepo
{
    public function __construct(private readonly Post $post)
    {

    }

    public function store($data)
    {
        return $this->post->query()->create($data);
    }
}
