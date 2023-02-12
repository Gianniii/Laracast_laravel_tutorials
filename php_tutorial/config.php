<?php
//config is different in prod, then locally so need to make it variables
return [
   'database' => [
        'host' => 'localhost',
        'port' => 3386,
        'dbname' => 'myapp',
        'charset' => 'utf8mb4'
   ],

   //example can stack configs for other external services
   'services' => [
        'prerenderer' => [
            'token' => '',
            'secret' => ''
        ]
   ]
];