<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=babar.elephantsql.com;dbname=rcexiegw',
    'username' => 'rcexiegw',
    'password' => 'k6cb2UnjShhPRKih-ZYGjnV7cGKJFCkK',
    'charset' => 'utf8',
    'schemaMap' => [
        'pgsql'=> [
            'class'=>'yii\db\pgsql\Schema',
            'defaultSchema' => 'public' //specify your schema here
        ]
    ], // PostgreSQL
];
