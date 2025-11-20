<?php
namespace App\Core;

use PDO;
use PDOException;

class DB
{
    private static ?PDO $connection = null;

    public static function getConnection(array $config): PDO
    {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO(
                    $config['db']['dsn'],
                    $config['db']['user'],
                    $config['db']['password'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
            } catch (PDOException $e) {
                throw new PDOException('Database connection failed: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
