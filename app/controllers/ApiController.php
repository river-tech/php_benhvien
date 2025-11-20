<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\VaccinationService;

class ApiController extends Controller
{
    public function vaccines(): void
    {
        $diseaseId = (string)($_GET['disease_id'] ?? '');
        $vaccines = $diseaseId ? VaccinationService::vaccinesByDisease($this->config, $diseaseId) : [];
        header('Content-Type: application/json');
        echo json_encode($vaccines);
    }
}
