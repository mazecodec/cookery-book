<?php

namespace App\Shared\Enums;

use App\Shared\Enums\Attributes\Description;
use App\Shared\Traits\AttributesToArray;
use App\Shared\Traits\GetsAttributes;

enum UnitMeasurement: string
{
    use GetsAttributes, AttributesToArray;

    #[Description('Cups')]
    case Cups = 'cups';
    #[Description('Grams')]
    case Grams = 'grams';
    #[Description('Kilograms')]
    case Kilograms = 'kilograms';
    #[Description('Liters')]
    case Liters = 'liters';
    #[Description('Milligrams')]
    case Milligrams = 'milligrams';
    #[Description('Milliliters')]
    case Milliliters = 'milliliters';
    #[Description('Ounces')]
    case Ounces = 'ounces';
    #[Description('Pounds')]
    case Pounds = 'pounds';
    #[Description('Tablespoons')]
    case Tablespoons = 'tablespoons';
    #[Description('Teaspoons')]
    case Teaspoons = 'teaspoons';
}
