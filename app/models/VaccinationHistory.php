<?php
namespace App\Models;

use App\Core\DB;

class VaccinationHistory
{
    public static function create(array $config, array $data): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('INSERT INTO vaccination_history(customer_id, vaccine_id, disease_id, dose_number, injected_at, next_schedule_at) VALUES (:customer_id, :vaccine_id, :disease_id, :dose_number, :injected_at, :next_schedule_at)');
        $stmt->execute([
            'customer_id' => $data['customer_id'],
            'vaccine_id' => $data['vaccine_id'],
            'disease_id' => $data['disease_id'],
            'dose_number' => $data['dose_number'],
            'injected_at' => $data['injected_at'],
            'next_schedule_at' => $data['next_schedule_at'],
        ]);
    }

    public static function history(array $config): array
    {
        $pdo = DB::getConnection($config);
        $sql = 'SELECT vh.*, c.fullname AS customer_name, v.name AS vaccine_name, d.name AS disease_name
                FROM vaccination_history vh
                JOIN customers c ON vh.customer_id = c.id
                JOIN vaccines v ON vh.vaccine_id = v.id
                JOIN diseases d ON vh.disease_id = d.id
                ORDER BY vh.injected_at DESC';
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }
}
