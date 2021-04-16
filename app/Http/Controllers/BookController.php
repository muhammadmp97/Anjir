<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'status' => 'ok',
            'data' => Book::getProperties()
        ]);
    }
}
