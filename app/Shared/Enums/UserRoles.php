<?php

namespace App\Shared\Enums;

use App\Shared\Enums\Attributes\Description;
use App\Shared\Traits\AttributesToArray;
use App\Shared\Traits\GetsAttributes;

enum UserRoles: string
{
    use GetsAttributes, AttributesToArray;

    #[Description('Administrator')]
    case Admin = 'admin';

    #[Description('Team Administrator')]
    case TeamAdmin = 'team_admin';

    #[Description('Support team')]
    case Support = 'support';

    #[Description('Basic role')]
    case Basic = 'basic';

}
