<?php
namespace App\Services;

use App\Core\DB;
use App\Models\Customer;
use App\Models\Disease;
use App\Models\VaccineDisease;
use App\Models\VaccinationHistory;
use DateInterval;
use DateTime;
use RuntimeException;

class VaccinationService
{
    public static function getFormData(array $config): array
    {
        return [
            'customers' => Customer::all($config),
            'diseases' => Disease::all($config),
        ];
    }

    public static function vaccinesByDisease(array $config, string $diseaseId): array
    {
        return VaccineDisease::getVaccinesByDisease($config, $diseaseId);
    }

    public static function register(array $config, array $data): void
    {
        $injectedAt = $data['injected_at'] ?: (new DateTime())->format('Y-m-d');
        $nextSchedule = $data['next_schedule_at'];
        if (!$nextSchedule) {
            $next = new DateTime($injectedAt);
            $next->add(new DateInterval('P30D'));
            $nextSchedule = $next->format('Y-m-d');
        }

        VaccinationHistory::create($config, [
            'customer_id' => $data['customer_id'],
            'vaccine_id' => $data['vaccine_id'],
            'dose_number' => $data['dose_number'],
            'injected_at' => $injectedAt,
            'next_schedule_at' => $nextSchedule,
        ]);
    }

    public static function history(array $config): array
    {
        return VaccinationHistory::history($config);
    }
}
