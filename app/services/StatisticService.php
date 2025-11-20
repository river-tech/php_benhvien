<?php
namespace App\Services;

use App\Core\DB;

class StatisticService
{
    public static function costPerCustomer(array $config): array
    {
        $pdo = DB::getConnection($config);
        $sql = 'SELECT c.makh AS id, c.hotenkh AS fullname, COALESCE(SUM(v.giavacxin), 0) AS total_cost
                FROM khachhang c
                LEFT JOIN lichsutiemphong vh ON vh.makh = c.makh
                LEFT JOIN vacxin v ON vh.mavacxin = v.mavacxin
                GROUP BY c.makh, c.hotenkh
                ORDER BY total_cost DESC';
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }
}
