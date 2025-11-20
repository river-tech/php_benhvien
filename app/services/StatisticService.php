<?php
namespace App\Services;

use App\Core\DB;

class StatisticService
{
    public static function costPerCustomer(array $config): array
    {
        $pdo = DB::getConnection($config);
        $sql = 'SELECT c.id, c.fullname, COALESCE(SUM(v.price), 0) AS total_cost
                FROM customers c
                LEFT JOIN vaccination_history vh ON vh.customer_id = c.id
                LEFT JOIN vaccines v ON vh.vaccine_id = v.id
                GROUP BY c.id, c.fullname
                ORDER BY total_cost DESC';
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }
}
