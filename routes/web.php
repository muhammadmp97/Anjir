<?php

use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'showForm']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/panel', [PanelController::class, 'show']);
Route::put('/panel/book', [BookController::class, 'update']);
