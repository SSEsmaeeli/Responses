<?php

namespace App\Contracts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface PostRepoInterface
{
    public function getUserPosts($userId): Collection;

    public function findByUuid($uuid): Model|null|Post;
}
