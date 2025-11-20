<?php
namespace App\Core;

class AuthMiddleware
{
    public static function handle(array $config): void
    {
        if (empty($_SESSION['user'])) {
            $base = rtrim($config['base_path'], '/');
            header('Location: ' . $base . '/login');
            exit;
        }
    }
}
