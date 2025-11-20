<?php
return [
    // Update this to match the folder name you are serving under MAMP
    'base_path' => '/php_benhvien',

    // Adjust DB settings to your actual database
    'db' => [
        // PostgreSQL on MAMP (matches your provided settings)
        'dsn' => 'pgsql:host=127.0.0.1;port=9696;dbname=benhvien_db',
        'user' => 'admin',
        'password' => '',

        // Example for MAMP's default MySQL (uncomment and edit if you want MySQL instead of Postgres)
        // 'dsn' => 'mysql:host=127.0.0.1;port=8889;dbname=benhvien;charset=utf8mb4',
        // 'user' => 'root',
        // 'password' => 'root',
    ],
];
