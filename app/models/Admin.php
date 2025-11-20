<?php
namespace App\Models;

use App\Core\DB;
use PDO;

class Admin
{
    public static function findByCredentials(array $config, string $username, string $password): ?array
    {
        // Fast path: built-in mock admin account, no DB needed
        if ($username === 'admin' && $password === 'admin') {
            return ['id' => 0, 'username' => 'admin', 'fullname' => 'Administrator'];
        }

        // Fallback: still allow real DB lookup if available
        try {
            $pdo = DB::getConnection($config);
            $stmt = $pdo->prepare('SELECT id, username, fullname FROM admin WHERE username = :username AND password = :password LIMIT 1');
            $stmt->execute(['username' => $username, 'password' => $password]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return $user;
            }
        } catch (\Throwable $e) {
            // Ignore DB errors for login when mock is used
        }

        return null;
    }
}
