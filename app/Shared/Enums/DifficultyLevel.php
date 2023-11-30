<?php

namespace App\Shared\Enums;

use App\Shared\Enums\Attributes\Description;
use App\Shared\Traits\AttributesToArray;
use App\Shared\Traits\GetsAttributes;

enum DifficultyLevel: string
{
    use GetsAttributes, AttributesToArray;

    #[Description('Easy Level')]
    case EASY = 'easy';

    #[Description('Medium Level')]
    case MEDIUM = 'medium';

    #[Description('Hard Level')]
    case HARD = 'hard';
}
