<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\VaccinationService;
use RuntimeException;

class VaccinationController extends Controller
{
    public function create(): void
    {
        $data = VaccinationService::getFormData($this->config);
        $this->render('vaccination/create', $data);
    }

    public function store(): void
    {
        try {
            VaccinationService::register($this->config, [
                'customer_id' => (int)($_POST['customer_id'] ?? 0),
                'disease_id' => (int)($_POST['disease_id'] ?? 0),
                'vaccine_id' => (int)($_POST['vaccine_id'] ?? 0),
                'dose_number' => (int)($_POST['dose_number'] ?? 1),
                'injected_at' => $_POST['injected_at'] ?? '',
                'next_schedule_at' => $_POST['next_schedule_at'] ?? '',
            ]);
            $_SESSION['flash'] = 'Vaccination registered successfully';
            $this->redirect('/vaccination/create');
        } catch (RuntimeException $e) {
            $_SESSION['flash'] = $e->getMessage();
            $this->redirect('/vaccination/create');
        }
    }
}
