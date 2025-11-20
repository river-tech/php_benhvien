<?php
namespace App\Models;

use App\Core\DB;
use PDO;

class Customer
{
    public static function all(array $config): array
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->query('SELECT makh AS id, hotenkh AS fullname, sodienthoai AS phone, diachikh AS address, ngaysinh AS dob, gioitinh AS gender FROM khachhang ORDER BY hotenkh');
        return $stmt->fetchAll();
    }

    public static function create(array $config, array $data): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('INSERT INTO khachhang(makh, hotenkh, sodienthoai, diachikh, ngaysinh, gioitinh) VALUES (:id, :fullname, :phone, :address, :dob, :gender)');
        $stmt->execute([
            'id' => $data['id'],
            'fullname' => $data['fullname'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'dob' => $data['dob'],
            'gender' => $data['gender'] ?? null,
        ]);
    }
}
