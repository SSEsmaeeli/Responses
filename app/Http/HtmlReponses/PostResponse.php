<?php

namespace App\Http\HtmlReponses;

class PostResponse
{
    public static function store($post)
    {
        return view('welcome', [
            'post' => $post
        ]);
    }
}
