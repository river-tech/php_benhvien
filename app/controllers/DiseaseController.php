<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Disease;
use RuntimeException;

class DiseaseController extends Controller
{
    public function index(): void
    {
        $diseases = Disease::all($this->config);
        $this->render('disease/index', compact('diseases'));
    }

    public function store(): void
    {
        Disease::create($this->config, [
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
        ]);
        $this->redirect('/diseases');
    }

    public function edit(int $id): void
    {
        $disease = Disease::find($this->config, $id);
        if (!$disease) {
            throw new RuntimeException('Disease not found');
        }
        $this->render('disease/edit', compact('disease'));
    }

    public function update(int $id): void
    {
        Disease::update($this->config, $id, [
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
        ]);
        $this->redirect('/diseases');
    }

    public function delete(int $id): void
    {
        Disease::delete($this->config, $id);
        $this->redirect('/diseases');
    }
}
