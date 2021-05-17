<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\Payment\PaymentInterface;
use App\Models\Book;
use App\Models\Transaction;

class PaymentController extends Controller
{
    private $payment;

    public function __construct(PaymentInterface $payment)
    {
        $this->payment = $payment;
    }

    public function createPaymentLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $orderId = Str::random(20) . time();
        $amount = Book::getProperty('price');

        $response = $this->payment->pay([
            'amount' => $amount * 10, // Convert to IRR
            'desc' => 'خرید کتاب ' . Book::getProperty('title'),
            'order_id' => $orderId
        ]);

        if (! $response) {
            return response()->json([
                'status' => 'error',
                'message' => 'مشکلی در ارتباط با درگاه پرداخت رخ داد!'
            ], 500);
        }

        Transaction::create([
            'email' => $request->email,
            'amount' => $amount,
            'order_id' => $orderId,
            'trans_id' => $response['id']
        ]);

        return response()->json([
            'status' => 'ok',
            'data' => [
                'link' => $response['link']
            ]
        ]);
    }
}
