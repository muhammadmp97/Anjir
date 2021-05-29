<?php

namespace App\Http\Controllers;

use App\Mail\BookDownloadLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Services\Payment\PaymentInterface;
use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    private $payment;

    public function __construct(PaymentInterface $payment)
    {
        $this->payment = $payment;
    }

    public function createLink(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ], [
            'email' => 'ایمیل وارد شده صحیح نیست!'
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

    public function verify()
    {
        $transaction = Transaction::where('order_id', request()->order_id)
            ->where('status', 0)
            ->first();

        if (! $transaction) {
            return view('payment_message', ['title' => 'تراکنش یافت نشد!', 'message' => 'تراکنشی با کد دریافت‌شده وجود ندارد!']);
        }

        $response = $this->payment->verify();

        if ($response && $response['status'] == 100) {
            $transaction->update(['track_id' => $response['track_id'], 'status' => 1]);
            
            Mail::to($transaction->email)->send(new BookDownloadLink);

            return view('payment_message', ['title' => 'خرید با موفقیت انجام شد!', 'message' => 'خرید با موفقیت انجام شد و لینک دانلود کتاب برای آدرس ایمیل واردشده ارسال گردید! کد رهگیری شما ' . $response['track_id'] . ' است.']);
        }

        return view('payment_message', ['title' => 'مشکلی در تأیید پرداخت شما رخ داد!', 'message' => 'نتوانستیم پرداخت شما را تأیید کنیم، شاید پرداخت را انجام نداده‌اید یا اینکه قبلاً از این پرداخت استفاده کرده‌اید. در صورتی که فکر می‌کنید مشکل از جانب ماست، با ما تماس بگیرید.']);
    }
}
