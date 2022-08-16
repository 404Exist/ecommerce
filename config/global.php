<?php

return [
    'redirects' => [
        'web' => [
            'guest' => 'login',
            'auth' => 'home',
            'logout' => 'home',
        ],
        'admin' => [
            'guest' => 'admin.login',
            'auth' => 'admin.dashboard',
            'logout' => 'admin.login',
        ],
    ],
];
