<?php
namespace App\Services;

use App\Models\Vaccine;
use App\Models\VaccineDisease;

class VaccineService
{
    public static function list(array $config): array
    {
        return Vaccine::all($config);
    }

    public static function create(array $config, array $data, array $diseaseIds): void
    {
        $id = Vaccine::create($config, $data);
        VaccineDisease::sync($config, $id, $diseaseIds);
    }

    public static function get(array $config, int $id): ?array
    {
        $vaccine = Vaccine::find($config, $id);
        if ($vaccine) {
            $vaccine['disease_ids'] = VaccineDisease::getDiseaseIds($config, $id);
        }
        return $vaccine;
    }

    public static function update(array $config, int $id, array $data, array $diseaseIds): void
    {
        Vaccine::update($config, $id, $data);
        VaccineDisease::sync($config, $id, $diseaseIds);
    }

    public static function delete(array $config, int $id): void
    {
        VaccineDisease::sync($config, $id, []);
        Vaccine::delete($config, $id);
    }
}
