<?php

namespace App\Services\Payment;

use Illuminate\Support\Facades\Http;
use App\Services\Payment\PaymentInterface;

class IDPay implements PaymentInterface
{
    private $endpoint = 'https://api.idpay.ir/v1.1/';
    private $headers;

    public function __construct($headers)
    {
        $this->headers = $headers;
    }

    public function pay($options)
    {
        $body = [
            'order_id' => $options['order_id'],
            'amount' => $options['amount'],
            'desc' => $options['desc'],
            'callback' => route('payment.verify')
        ];

        $response = Http::withHeaders($this->headers)
            ->post($this->endpoint . 'payment', $body);

        return ($response->status() === 201) ? $response->json() : false;
    }

    public function verify()
    {
        $body = [
            'id' => request()->id,
            'order_id' => request()->order_id
        ];

        $response = Http::withHeaders($this->headers)
            ->post($this->endpoint . 'payment/verify', $body);

        return ($response->status() === 200) ? $response->json() : false;
    }
}
