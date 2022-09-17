<?php

namespace App\States\Post;

use App\Enums\UserRole;

class Pending extends PostBaseState
{
    const TITLE = 'pending';

    const COLOR = 'warning';

    const NEXT = [
        Published::class,
        Rejected::class
    ];

    const PERMITTED_ROLES = [
        UserRole::ADMIN,
        UserRole::CLIENT,
    ];
}
