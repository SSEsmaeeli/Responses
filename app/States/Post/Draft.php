<?php

namespace App\States\Post;

use App\Enums\UserRole;

class Draft extends PostBaseState
{
    const TITLE = 'draft';

    const COLOR = 'primary';

    const NEXT = [
        Review::class,
        Rejected::class
    ];

    const PERMITTED_ROLES = [
        UserRole::ADMIN,
        UserRole::CLIENT,
    ];
}
