<?php
namespace App\Models;

use App\Core\DB;
use PDO;

class Admin
{
    public static function findByCredentials(array $config, string $username, string $password): ?array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('SELECT id, username, fullname FROM admin WHERE username = :username AND password = :password LIMIT 1');
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user;
        }
        return null;
    }
}
