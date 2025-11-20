<?php
namespace App\Models;

use App\Core\DB;

class VaccinationHistory
{
    public static function create(array $config, array $data): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('INSERT INTO lichsutiemphong(makh, mavacxin, sttmui, ngaytiemphong, ngayhentieptheo) VALUES (:customer_id, :vaccine_id, :dose_number, :injected_at, :next_schedule_at)');
        $stmt->execute([
            'customer_id' => $data['customer_id'],
            'vaccine_id' => $data['vaccine_id'],
            'dose_number' => $data['dose_number'],
            'injected_at' => $data['injected_at'],
            'next_schedule_at' => $data['next_schedule_at'],
        ]);
    }

    public static function history(array $config): array
    {
        $pdo = DB::getConnection($config);
        $sql = 'SELECT vh.makh AS customer_id,
                       c.hotenkh AS customer_name,
                       vh.mavacxin AS vaccine_id,
                       v.tenvacxin AS vaccine_name,
                       d.tenbenh AS disease_name,
                       vh.sttmui AS dose_number,
                       vh.ngaytiemphong AS injected_at,
                       vh.ngayhentieptheo AS next_schedule_at
                FROM lichsutiemphong vh
                JOIN khachhang c ON vh.makh = c.makh
                JOIN vacxin v ON vh.mavacxin = v.mavacxin
                LEFT JOIN benh d ON d.mabenh = (SELECT pb.mabenh FROM phongbenh pb WHERE pb.mavacxin = vh.mavacxin LIMIT 1)
                ORDER BY vh.ngaytiemphong DESC';
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }
}
