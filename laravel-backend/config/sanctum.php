<?php

return [

    // ❌ SPA / Cookie auth DISABLED
    'stateful' => [],

    // ✅ Token-based auth
    'guard' => ['web'],

    'expiration' => null,

    'token_prefix' => '',

    'middleware' => [
        'verify_csrf_token' => App\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => App\Http\Middleware\EncryptCookies::class,
    ],

];
