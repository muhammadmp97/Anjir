<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required'],
            'description' => ['required'],
            'author' => ['required'],
            'version' => ['required'],
            'price' => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'واردکردن عنوان کتاب الزامی است!',
            'description.required' => 'واردکردن توضیحات کتاب الزامی است!',
            'author.required' => 'واردکردن نام نویسنده الزامی است!',
            'version.required' => 'واردکردن نسخه کتاب الزامی است!',
            'price.required' => 'واردکردن قیمت کتاب الزامی است!',
            'price.numeric' => 'قیمت کتاب باید عددی باشد!',
        ];
    }
}
