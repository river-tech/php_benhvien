<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\VaccinationService;

class ApiController extends Controller
{
    public function vaccines(): void
    {
        $diseaseId = (int)($_GET['disease_id'] ?? 0);
        $vaccines = $diseaseId ? VaccinationService::vaccinesByDisease($this->config, $diseaseId) : [];
        header('Content-Type: application/json');
        echo json_encode($vaccines);
    }
}
