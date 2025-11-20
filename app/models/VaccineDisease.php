<?php
namespace App\Models;

use App\Core\DB;

class VaccineDisease
{
    public static function sync(array $config, string $vaccineId, array $diseaseIds): void
    {
        $pdo = DB::getConnection($config);
        $pdo->prepare('DELETE FROM phongbenh WHERE mavacxin = :id')->execute(['id' => $vaccineId]);
        $stmt = $pdo->prepare('INSERT INTO phongbenh(mavacxin, mabenh) VALUES (:vaccine_id, :disease_id)');
        foreach ($diseaseIds as $diseaseId) {
            if ($diseaseId !== '') {
                $stmt->execute([
                    'vaccine_id' => $vaccineId,
                    'disease_id' => $diseaseId,
                ]);
            }
        }
    }

    public static function getDiseaseIds(array $config, string $vaccineId): array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('SELECT mabenh AS disease_id FROM phongbenh WHERE mavacxin = :id');
        $stmt->execute(['id' => $vaccineId]);
        return array_column($stmt->fetchAll(), 'disease_id');
    }

    public static function getVaccinesByDisease(array $config, string $diseaseId): array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('SELECT v.mavacxin AS id, v.tenvacxin AS name, v.tenhangsx AS manufacturer, v.giavacxin AS price, v.mota AS description, v.somui AS dose_count
                               FROM vacxin v
                               JOIN phongbenh vd ON v.mavacxin = vd.mavacxin
                               WHERE vd.mabenh = :disease
                               ORDER BY v.tenvacxin');
        $stmt->execute(['disease' => $diseaseId]);
        return $stmt->fetchAll();
    }
}
