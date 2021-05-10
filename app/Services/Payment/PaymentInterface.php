<?php

namespace App\Services\Payment;

interface PaymentInterface
{
    public function pay(array $options);

    public function verify();
}
