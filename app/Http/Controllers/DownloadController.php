<?php

namespace App\Http\Controllers;

use App\Models\Book;

class DownloadController extends Controller
{
    public function __construct()
    {
        if (! request()->hasValidSignature()) {
            abort(401);
        }
    }

    public function __invoke()
    {
        $bookFileName = Book::getProperty('book_file');

        return response()->download(
            'storage/' . $bookFileName,
            'book.pdf'
        );
    }
}
