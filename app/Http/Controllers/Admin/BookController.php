<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Cache;

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
            Book::firstOrCreate(
                ['property' => $field],
                ['value' => $request->$field]
            );
        }

        if ($request->hasFile('cover_photo')) {
            // TODO: upload the photo
        }

        if ($request->hasFile('book_file')) {
            // TODO: upload the file
        }

        // TODO: Demo version

        return back();
    }
}
