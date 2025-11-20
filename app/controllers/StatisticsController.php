<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Services\StatisticService;

class StatisticsController extends Controller
{
    public function index(): void
    {
        $stats = StatisticService::costPerCustomer($this->config);
        $this->render('statistics/index', compact('stats'));
    }
}
