<?php

namespace App\Shared\Traits;

use Illuminate\Support\Str;
use ReflectionClassConstant;
use App\Enums\Attributes\Description;

trait GetsAttributes
{
    /**
     * @param self $enum
     * @return string
     */
    private static function getDescription(self $enum): string
    {
        $ref = new ReflectionClassConstant(self::class, $enum->name);
        $classAttributes = $ref->getAttributes(Description::class);

        if (count($classAttributes) === 0) {
            return Str::headline($enum->value);
        }

        return $classAttributes[0]->newInstance()->description;
    }
}
