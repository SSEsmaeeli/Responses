<?php

namespace App\CachedRepo;

use App\Contracts\PostRepoInterface;
use App\Repos\PostRepo;
use Illuminate\Contracts\Cache\Repository as Cache;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PostCachedRepo implements PostRepoInterface
{
    const CACHE_DURATION_IN_SECONDS = 60;

    public function __construct(private readonly Cache $cache, private readonly PostRepo $postRepo)
    {
    }

    public function getUserPosts($userId): Collection
    {
        return $this->cache->remember('user:' . $userId . '_posts', self::CACHE_DURATION_IN_SECONDS, function () use ($userId) {
            return $this->postRepo->getUserPosts($userId);
        });
    }

    public function findByUuid($uuid): Model|null|Post
    {
        return $this->cache->remember('post:' . $uuid, self::CACHE_DURATION_IN_SECONDS, function () use ($uuid) {
            return $this->postRepo->findByUuid($uuid);
        });
    }
}
