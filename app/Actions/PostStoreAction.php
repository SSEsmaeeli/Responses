<?php

namespace App\Actions;

use App\Models\Post;
use App\Repos\PostRepo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PostStoreAction
{
    private Model $post;

    public function __construct(private readonly PostRepo $postRepo)
    {

    }

    public function store($data)
    {
        $slug = $this->addSlugToPost($data['title']);

        $data['body'] = $slug;
        ///
        ///
        ///
        ///
        $this->post = $this->postRepo->store($data);
        return $this;
    }

    public function getPost()
    {
        return $this->post;
    }

    private function addSlugToPost($title)
    {
        return (string) Str::of($title)->slug();
    }
}
