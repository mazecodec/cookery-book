<?php

namespace App\Shared\Enums;

use App\Shared\Enums\Attributes\Description;
use App\Shared\Traits\GetsAttributes;

enum UserRoles: string
{
    use GetsAttributes;

    #[Description('Administrator')]
    case Admin = 'admin';

    #[Description('Team Administrator')]
    case TeamAdmin = 'team_admin';

    #[Description('Support team')]
    case Support = 'support';
    case Basic = 'basic';

    /**
     * <select name="roles">
     *  <foreach(UserRoles::asSelectArray() as $role)>
     *      <option value="{{ $role->value }}">{{ $role->name }}</option>
     *  </endforeach>
     * </select>
     * @return array<string,string>
     */
    public static function asSelectArray(): array
    {
        /** @var array<string,string> $values */
        $values = collect(self::cases())
            ->map(function ($enum) {
                return [
                    'name' => self::getDescription($enum),
                    'value' => $enum->value,
                ];
            })->toArray();

        return $values;
    }
}
