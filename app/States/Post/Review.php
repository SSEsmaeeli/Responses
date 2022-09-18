<?php

namespace App\States\Post;

use App\Enums\UserRole;

class Review extends PostBaseState
{
    const TITLE = 'review';

    const COLOR = 'warning';

    const NEXT = [
        Published::class,
        Rejected::class,
    ];

    const PERMITTED_ROLES = [
        UserRole::ADMIN,
        UserRole::CLIENT,
    ];
}
