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

    public static function vaccinesByDisease(array $config, int $diseaseId): array
    {
        return VaccineDisease::getVaccinesByDisease($config, $diseaseId);
    }

    public static function register(array $config, array $data): void
    {
        $pdo = DB::getConnection($config);
        $stmt = $pdo->prepare('SELECT vaccine_id FROM vaccination_history WHERE customer_id = :customer AND disease_id = :disease LIMIT 1');
        $stmt->execute([
            'customer' => $data['customer_id'],
            'disease' => $data['disease_id'],
        ]);
        $existing = $stmt->fetchColumn();
        if ($existing && (int)$existing !== (int)$data['vaccine_id']) {
            throw new RuntimeException('Customer already assigned a different vaccine for this disease.');
        }

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
            'disease_id' => $data['disease_id'],
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
