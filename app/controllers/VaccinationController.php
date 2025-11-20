<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\VaccinationService;
use RuntimeException;

class VaccinationController extends Controller
{
    public function create(): void
    {
        try {
            $data = VaccinationService::getFormData($this->config);
            $data['error'] = null;
        } catch (\Throwable $e) {
            // Avoid 500s when DB is not reachable
            $data = [
                'customers' => [],
                'diseases' => [],
                'error' => 'Database error: ' . $e->getMessage(),
            ];
        }

        $this->render('vaccination/create', $data);
    }

    public function store(): void
    {
        try {
            VaccinationService::register($this->config, [
                'customer_id' => (string)($_POST['customer_id'] ?? ''),
                'disease_id' => (string)($_POST['disease_id'] ?? ''),
                'vaccine_id' => (string)($_POST['vaccine_id'] ?? ''),
                'dose_number' => (int)($_POST['dose_number'] ?? 1),
                'injected_at' => $_POST['injected_at'] ?? '',
                'next_schedule_at' => $_POST['next_schedule_at'] ?? '',
            ]);
            $_SESSION['flash'] = 'Vaccination registered successfully';
            $this->redirect('/vaccination/create');
        } catch (\Throwable $e) {
            $_SESSION['flash'] = $e->getMessage();
            $this->redirect('/vaccination/create');
        }
    }
}
