<?php
namespace App\Models;

use App\Core\DB;
use PDO;

class Vaccine
{
    public static function all(array $config): array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->query('SELECT * FROM vaccines ORDER BY id DESC');
        return $stmt->fetchAll();
    }

    public static function find(array $config, int $id): ?array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('SELECT * FROM vaccines WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $vaccine = $stmt->fetch(PDO::FETCH_ASSOC);
        return $vaccine ?: null;
    }

    public static function create(array $config, array $data): int
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('INSERT INTO vaccines(name, manufacturer, price, description) VALUES (:name, :manufacturer, :price, :description) RETURNING id');
        $stmt->execute([
            'name' => $data['name'],
            'manufacturer' => $data['manufacturer'],
            'price' => $data['price'],
            'description' => $data['description'],
        ]);
        return (int) $stmt->fetchColumn();
    }

    public static function update(array $config, int $id, array $data): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('UPDATE vaccines SET name = :name, manufacturer = :manufacturer, price = :price, description = :description WHERE id = :id');
        $stmt->execute([
            'name' => $data['name'],
            'manufacturer' => $data['manufacturer'],
            'price' => $data['price'],
            'description' => $data['description'],
            'id' => $id,
        ]);
    }

    public static function delete(array $config, int $id): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('DELETE FROM vaccines WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
