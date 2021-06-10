<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'showForm']);
Route::post('/login', [LoginController::class, 'login']);
