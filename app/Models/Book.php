<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Book extends Model
{
    protected $table = 'book_properties';

    public static $defaults = [
        'title' => 'سلام دنیا!',
        'author' => 'وب‌پژوه',
        'description' => 'توضیحی برای این کتاب ثبت نشده است. لطفا در بخش مدیریت نسبت به ثبت مشخصات کتاب و تکمیل تنظیمات وب‌سایت اقدام فرمایید.',
        'cover_photo' => '#',
        'version' => 'ویرایش اول',
        'price' => '45000',
        'free_version_url' => '#',
        'complete_version_url' => '#',
    ];

    public static function getProperty($property)
    {
        $properties = Cache::rememberForever('anjir_book_info', function () {
            return static::all();
        });

        $dbValue = optional($properties->firstWhere('property', $property))->value;

        return $dbValue ?: static::$defaults[$property];
    }

    public static function getProperties()
    {
        $result = [];

        foreach (array_keys(static::$defaults) as $property) {
            $result[$property] = static::getProperty($property);
        }

        return $result;
    }
}
