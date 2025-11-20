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
            'id' => $_POST['id'] ?? '',
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
        ]);
        $this->redirect('/diseases');
    }

    public function edit(string $id): void
    {
        $disease = Disease::find($this->config, $id);
        if (!$disease) {
            throw new RuntimeException('Disease not found');
        }
        $this->render('disease/edit', compact('disease'));
    }

    public function update(string $id): void
    {
        Disease::update($this->config, $id, [
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
        ]);
        $this->redirect('/diseases');
    }

    public function delete(string $id): void
    {
        Disease::delete($this->config, $id);
        $this->redirect('/diseases');
    }
}
