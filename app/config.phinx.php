<?php
require 'config.php';

return [
    'paths' => [
        'migrations' => 'app/migrations',
        'seeds' => 'app/seeds'
    ],
    'migration_base_class' => 'app\migrations\Migration',
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => 'mysql',
            'host' => DB_SERVER,
            'name' => DB_DATABASE,
            'user' => DB_USERNAME,
            'pass' => DB_PASSWORD,
            'port' => ''
        ]
    ]
];
