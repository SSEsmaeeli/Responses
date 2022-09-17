<?php

namespace App\States\Post;

use App\Enums\UserRole;

class Rejected extends PostBaseState
{
    const TITLE = 'rejected';

    const COLOR = 'danger';

    const PERMITTED_ROLES = [
        UserRole::ADMIN
    ];
}
