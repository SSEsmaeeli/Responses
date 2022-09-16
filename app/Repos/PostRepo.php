<?php

namespace App\Repos;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PostRepo
{
    public function __construct(private readonly Post $post)
    {
    }

    public function store($data): Post|Model
    {
        return $this->post->query()->create($data);
    }

    public function getUserPosts($userId): Collection
    {
        return $this->post->query()->owner($userId)->get();
    }

    public function findByUuid($uuid): Model|null
    {
        return $this->post->query()->where('uuid', $uuid)->first();
    }

    public function update($postId, $data): int
    {
        return $this->post->query()->where('uuid', $postId)->update($data);
    }

    public function deleteByUuid($postUuid): int
    {
        return $this->post->query()->where('uuid', $postUuid)->delete();
    }
}
