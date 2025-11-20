<?php
namespace App\Models;

use App\Core\DB;

class VaccineDisease
{
    public static function sync(array $config, int $vaccineId, array $diseaseIds): void
    {
        $pdo = DB::getConnection($config);
        $pdo->prepare('DELETE FROM vaccine_disease WHERE vaccine_id = :id')->execute(['id' => $vaccineId]);
        $stmt = $pdo->prepare('INSERT INTO vaccine_disease(vaccine_id, disease_id) VALUES (:vaccine_id, :disease_id)');
        foreach ($diseaseIds as $diseaseId) {
            if ($diseaseId !== '') {
                $stmt->execute([
                    'vaccine_id' => $vaccineId,
                    'disease_id' => $diseaseId,
                ]);
            }
        }
    }

    public static function getDiseaseIds(array $config, int $vaccineId): array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('SELECT disease_id FROM vaccine_disease WHERE vaccine_id = :id');
        $stmt->execute(['id' => $vaccineId]);
        return array_column($stmt->fetchAll(), 'disease_id');
    }

    public static function getVaccinesByDisease(array $config, int $diseaseId): array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('SELECT v.* FROM vaccines v JOIN vaccine_disease vd ON v.id = vd.vaccine_id WHERE vd.disease_id = :disease ORDER BY v.name');
        $stmt->execute(['disease' => $diseaseId]);
        return $stmt->fetchAll();
    }
}
