<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait HasProperties
{
    public static function getProperty($property)
    {
        $properties = Cache::rememberForever('anjir_book_info', function () {
            return static::all();
        });

        $dbValue = optional($properties->firstWhere('property', $property))->value;

        return ! is_null($dbValue) ? $dbValue : static::$defaults[$property];
    }

    public static function getProperties()
    {
        $result = [];

        foreach (array_keys(static::$defaults) as $property) {
            $result[$property] = static::getProperty($property);
        }

        return $result;
    }

    public static function updateProperty($property, $value)
    {
        static::updateOrCreate(
            ['property' => $property],
            ['value' => $value]
        );
    }
}