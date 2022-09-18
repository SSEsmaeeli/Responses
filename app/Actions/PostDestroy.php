<?php

namespace App\Actions;

use App\Repos\PostRepo;

class PostDestroy
{
    private string $postUuid;

    public function __construct(private readonly PostRepo $postRepo)
    {
    }

    public function handle()
    {
        return $this->postRepo->deleteByUuid($this->postUuid);
    }

    public function setPostUuid($postUuid): static
    {
        $this->postUuid = $postUuid;

        return $this;
    }
}
