<?php
return [
    'db' => [
        'host'     => '127.0.0.1',
        'name'     => 'my_secure_app',
        'user'     => 'db_admin_root',
        'pass'     => 'your_secret_password_here',
        'charset'  => 'utf8mb4',
    ],
    'app' => [
        'env'      => 'development', // Options: development, production
        'url'      => 'https://yourdomain.com',
        'debug'    => true,
    ],
    'mail' => [
        'smtp_host' => 'smtp.mailtrap.io',
        'smtp_port' => 2525,
    ]
];
