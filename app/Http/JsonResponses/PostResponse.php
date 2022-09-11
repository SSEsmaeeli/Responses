<?php

namespace App\Http\JsonResponses;

class PostResponse
{
    public static function store($post)
    {
        return $post;
    }
}
