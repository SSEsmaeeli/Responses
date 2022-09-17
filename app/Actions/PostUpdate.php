<?php

namespace App\Actions;

use App\Models\Post;
use App\Repos\PostRepo;
use Illuminate\Database\Eloquent\Model;

class PostUpdate
{
    private string $postUuid;

    private array $data;

    public function __construct(private readonly PostRepo $postRepo)
    {
    }

    public function handle()
    {
        $this->postRepo->update($this->postUuid, $this->data);
    }

    public function setPostUuid(string $postUuid): static
    {
        $this->postUuid = $postUuid;
        return $this;
    }

    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }

    public function getPost(): Post
    {
        return $this->postRepo->findByUuid($this->postUuid);
    }
}
