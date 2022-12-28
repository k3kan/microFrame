<?php

return [
    'route' => [
        // example 'about' => 'index/about'
        '' => 'index/index',
        'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
        ],
    'db' => [
        'dbName' => 'framework',
        'dbHost' => '127.0.0.1',
        'dbUser' => 'root',
        'dbPassword' => ''
    ],
];