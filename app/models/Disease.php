<?php
namespace App\Models;

use App\Core\DB;
use PDO;

class Disease
{
    public static function all(array $config): array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->query('SELECT * FROM diseases ORDER BY name');
        return $stmt->fetchAll();
    }

    public static function find(array $config, int $id): ?array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('SELECT * FROM diseases WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $disease = $stmt->fetch(PDO::FETCH_ASSOC);
        return $disease ?: null;
    }

    public static function create(array $config, array $data): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('INSERT INTO diseases(name, description) VALUES (:name, :description)');
        $stmt->execute([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    }

    public static function update(array $config, int $id, array $data): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('UPDATE diseases SET name = :name, description = :description WHERE id = :id');
        $stmt->execute([
            'name' => $data['name'],
            'description' => $data['description'],
            'id' => $id,
        ]);
    }

    public static function delete(array $config, int $id): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('DELETE FROM diseases WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
