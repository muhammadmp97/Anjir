<?php

return [
    'services' => [
        'idpay' => [
            'token' => env('IDPAY_TOKEN'),
            'sandbox' => 1, // 1 or 0
        ]
    ]
];
