<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Disease;
use App\Services\VaccineService;
use RuntimeException;

class VaccineController extends Controller
{
    public function index(): void
    {
        $vaccines = VaccineService::list($this->config);
        $diseases = Disease::all($this->config);
        $this->render('vaccine/index', compact('vaccines', 'diseases'));
    }

    public function create(): void
    {
        $diseases = Disease::all($this->config);
        $this->render('vaccine/create', compact('diseases'));
    }

    public function store(): void
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'manufacturer' => $_POST['manufacturer'] ?? '',
            'price' => $_POST['price'] ?? 0,
            'description' => $_POST['description'] ?? '',
        ];
        $diseaseIds = $_POST['diseases'] ?? [];
        VaccineService::create($this->config, $data, $diseaseIds);
        $this->redirect('/vaccines');
    }

    public function edit(int $id): void
    {
        $vaccine = VaccineService::get($this->config, $id);
        if (!$vaccine) {
            throw new RuntimeException('Vaccine not found');
        }
        $diseases = Disease::all($this->config);
        $this->render('vaccine/edit', compact('vaccine', 'diseases'));
    }

    public function update(int $id): void
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'manufacturer' => $_POST['manufacturer'] ?? '',
            'price' => $_POST['price'] ?? 0,
            'description' => $_POST['description'] ?? '',
        ];
        $diseaseIds = $_POST['diseases'] ?? [];
        VaccineService::update($this->config, $id, $data, $diseaseIds);
        $this->redirect('/vaccines');
    }

    public function delete(int $id): void
    {
        VaccineService::delete($this->config, $id);
        $this->redirect('/vaccines');
    }
}
