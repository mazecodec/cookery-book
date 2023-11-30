<?php

namespace App\Shared\Traits;

trait AttributesToArray
{
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
        $values = collect(self::cases())->map(function ($enum) {
            return [
                'name' => self::getDescription($enum),
                'value' => $enum->value,
            ];
        })->toArray();

        return $values;
    }
}
