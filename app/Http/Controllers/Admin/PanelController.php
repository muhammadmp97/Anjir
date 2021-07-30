<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function show()
    {
        $data = Book::getProperties();

        return view('admin.panel', compact('data'));
    }
}
