<?php
namespace App\Models;

use App\Core\DB;
use PDO;

class Disease
{
    public static function all(array $config): array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->query('SELECT mabenh AS id, tenbenh AS name, mota AS description FROM benh ORDER BY tenbenh');
        return $stmt->fetchAll();
    }

    public static function find(array $config, string $id): ?array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('SELECT mabenh AS id, tenbenh AS name, mota AS description FROM benh WHERE mabenh = :id');
        $stmt->execute(['id' => $id]);
        $disease = $stmt->fetch(PDO::FETCH_ASSOC);
        return $disease ?: null;
    }

    public static function create(array $config, array $data): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('INSERT INTO benh(mabenh, tenbenh, mota) VALUES (:id, :name, :description)');
        $stmt->execute([
            'id' => $data['id'],
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    }

    public static function update(array $config, string $id, array $data): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('UPDATE benh SET tenbenh = :name, mota = :description WHERE mabenh = :id');
        $stmt->execute([
            'name' => $data['name'],
            'description' => $data['description'],
            'id' => $id,
        ]);
    }

    public static function delete(array $config, string $id): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('DELETE FROM benh WHERE mabenh = :id');
        $stmt->execute(['id' => $id]);
    }
}
