<?php

namespace App\Actions;

use App\Repos\PostRepo;
use Illuminate\Database\Eloquent\Model;

class PostUpdate
{
    private string $postId;

    private array $data;

    public function __construct(private readonly PostRepo $postRepo)
    {
    }

    public function handle()
    {
        $this->postRepo->update($this->postId, $this->data);
    }

    public function setPostId(string $postId): static
    {
        $this->postId = $postId;
        return $this;
    }

    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }

    public function getPost(): Model
    {
        return $this->postRepo->findByUUID($this->postId);
    }
}