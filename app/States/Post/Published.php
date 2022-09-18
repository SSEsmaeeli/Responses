<?php

namespace App\States\Post;

use App\Enums\UserRole;

class Published extends PostBaseState
{
    const TITLE = 'published';

    const COLOR = 'success';

    const NEXT = [
        Review::class,
        Rejected::class
    ];

    const PERMITTED_ROLES = [
        UserRole::ADMIN
    ];
}
