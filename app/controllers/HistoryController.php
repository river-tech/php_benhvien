<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\VaccinationService;

class HistoryController extends Controller
{
    public function index(): void
    {
        $records = VaccinationService::history($this->config);
        $this->render('history/index', compact('records'));
    }
}
