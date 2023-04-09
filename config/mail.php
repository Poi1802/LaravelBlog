<?php

return [
  'driver' => env('MAIL_DRIVER', 'smtp'),
  'host' => env('MAIL_HOST', 'smtp.yandex.ru'),
  'port' => env('MAIL_PORT', 587),
  'from' => [
    'address' => 'zheniabajenow@yandex.ru',
    'name' => 'Eugen',
  ],
  'encryption' => env('MAIL_ENCRYPTION', 'tls'),
  'username' => env('MAIL_USERNAME', 'zheniabajenow@yandex.ru'),
  'password' => env('MAIL_PASSWORD', 'zymhppwqwixlmidw'),
];