<?php

return [
    'administrator' => [
        'username' => 'admin',
        'password' => 'admin',
    ],
    'services' => [
        'idpay' => [
            'token' => env('IDPAY_TOKEN'),
            'sandbox' => 1, // 1 or 0
        ]
    ]
];
