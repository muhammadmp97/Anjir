<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function update(BookUpdateRequest $request)
    {
        Cache::forget('anjir_book_info');

        $fields = ['title', 'author', 'description', 'version', 'price'];
        foreach ($fields as $field) {
            Book::updateProperty($field, $request->$field);
        }

        if ($request->hasFile('cover_photo')) {
            $uploadedFile = $request->file('cover_photo')
                ->storeAs('public', 'cover_photo.jpg');

            if ($uploadedFile) {
                Book::updateProperty('cover_photo', asset('storage/cover_photo.jpg'));
            }
        }

        if ($request->hasFile('book_file')) {
            $bookFileName = Str::random(12) . '.pdf';

            $bookFile = $request->file('book_file')
                ->storeAs('public', $bookFileName);

            if ($bookFile) {
                Book::updateProperty('book_file', $bookFileName);
            }
        }

        // TODO: Demo version

        return back();
    }
}
