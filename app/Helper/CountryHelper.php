<?php

namespace App\Helper;

use Symfony\Component\Intl\Countries;

class CountryHelper
{
    public static function all(): array
    {
        return Countries::getNames();
    }

    public static function getCode(): array
    {
        return array_keys(self::all());
    }
}
