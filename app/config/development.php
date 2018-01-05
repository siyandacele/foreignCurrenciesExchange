<?php 

return [
    
  'app' => [
      'url' => 'http://localhost',
      'hash' => [
          'algo' => PASSWORD_BCRYPT,
          'cost' => 10
      ]
  ],
    
    'db' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'name' => 'currencies_db',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => ''
    ],
    
    'auth' => [
        'session' => 'user_id',
        'remember' => 'user_r'
    ],
    'api' =>[
        'globalcurrencies' => 'DD6C71A328D742FB8AC0EB1FDC83FD84'
    ],
    'mail' => [
        'smtp_auth' => true,
        'smtp_secure' => 'ssl',
        'host' => 'smtp.gmail.com',
        'username' => 'siyandatest@gmail.com',
        'password' => '123456siyanda',
        'name' => 'Foreign Currencies Exchange',
        'port' => 465,
        'html' => true
    ],
    
    'twig' => [
        'debug' => true
    ],
    
    'csrf' => [
        'key' => 'csrt_token'
    ]
];