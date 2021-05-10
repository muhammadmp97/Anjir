<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Payment\IDPay;
use App\Services\Payment\PaymentInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PaymentInterface::class, function () {
            return new IDPay([
                'Content-type' => 'application/json',
                'X-API-KEY' => config('anjir.services.idpay.token'),
                'X-SANDBOX' => config('anjir.services.idpay.sandbox')
            ]);
        });
    }

    public function boot()
    {
        //
    }
}
