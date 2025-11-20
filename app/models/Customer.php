<?php
namespace App\Models;

use App\Core\DB;
use PDO;

class Customer
{
    public static function all(array $config): array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->query('SELECT * FROM customers ORDER BY fullname');
        return $stmt->fetchAll();
    }

    public static function create(array $config, array $data): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('INSERT INTO customers(fullname, phone, email, address, dob) VALUES (:fullname, :phone, :email, :address, :dob)');
        $stmt->execute([
            'fullname' => $data['fullname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address'],
            'dob' => $data['dob'],
        ]);
    }
}
