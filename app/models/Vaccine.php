<?php
namespace App\Models;

use App\Core\DB;
use PDO;

class Vaccine
{
    public static function all(array $config): array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->query('SELECT mavacxin AS id, tenvacxin AS name, tenhangsx AS manufacturer, giavacxin AS price, mota AS description, somui AS dose_count FROM vacxin ORDER BY mavacxin DESC');
        return $stmt->fetchAll();
    }

    public static function find(array $config, string $id): ?array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('SELECT mavacxin AS id, tenvacxin AS name, tenhangsx AS manufacturer, giavacxin AS price, mota AS description, somui AS dose_count FROM vacxin WHERE mavacxin = :id');
        $stmt->execute(['id' => $id]);
        $vaccine = $stmt->fetch(PDO::FETCH_ASSOC);
        return $vaccine ?: null;
    }

    public static function create(array $config, array $data): string
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('INSERT INTO vacxin(mavacxin, tenvacxin, tenhangsx, giavacxin, mota, somui) VALUES (:id, :name, :manufacturer, :price, :description, :dose_count) RETURNING mavacxin');
        $stmt->execute([
            'id' => $data['id'],
            'name' => $data['name'],
            'manufacturer' => $data['manufacturer'],
            'price' => $data['price'],
            'description' => $data['description'],
            'dose_count' => $data['dose_count'] ?? 1,
        ]);
        return (string) $stmt->fetchColumn();
    }

    public static function update(array $config, string $id, array $data): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('UPDATE vacxin SET tenvacxin = :name, tenhangsx = :manufacturer, giavacxin = :price, mota = :description, somui = :dose_count WHERE mavacxin = :id');
        $stmt->execute([
            'name' => $data['name'],
            'manufacturer' => $data['manufacturer'],
            'price' => $data['price'],
            'description' => $data['description'],
            'dose_count' => $data['dose_count'] ?? 1,
            'id' => $id,
        ]);
    }

    public static function delete(array $config, string $id): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('DELETE FROM vacxin WHERE mavacxin = :id');
        $stmt->execute(['id' => $id]);
    }
}
