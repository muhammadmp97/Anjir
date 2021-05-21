<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PaymentController;

Route::get('/book', BookController::class);

Route::post('/payment/link', [PaymentController::class, 'createLink']);
Route::post('/payment/verify', [PaymentController::class, 'verify'])->name('payment.verify');
