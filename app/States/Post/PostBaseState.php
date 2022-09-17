<?php

namespace App\States\Post;

class PostBaseState
{
    public function getAllStates(): array
    {
        return [
            Draft::TITLE,
            Pending::TITLE,
            Published::TITLE,
            Rejected::TITLE,
        ];
    }

    public function getTITLE(): string
    {
        return static::TITLE;
    }

    public function getColor(): string
    {
        return static::COLOR;
    }
}
