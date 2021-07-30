<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasProperties;

class Book extends Model
{
    use HasProperties;

    protected $guarded = [];
    protected $table = 'book_properties';
    public $timestamps = false;

    public static $defaults = [
        'title' => 'سلام دنیا!',
        'author' => 'وب‌پژوه',
        'description' => 'توضیحی برای این کتاب ثبت نشده است. لطفا در بخش مدیریت نسبت به ثبت مشخصات کتاب و تکمیل تنظیمات وب‌سایت اقدام فرمایید.',
        'cover_photo' => '/images/book_cover.jpg',
        'version' => 'ویرایش اول',
        'price' => 0,
        'free_version_url' => null,
    ];
}
