<?php
namespace App\Core;

class Controller
{
    protected array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    protected function render(string $view, array $params = []): void
    {
        extract($params);
        $basePath = rtrim($this->config['base_path'], '/');
        $viewPath = __DIR__ . '/../../views/' . $view . '.php';
        if (!file_exists($viewPath)) {
            throw new \RuntimeException("View {$view} not found");
        }
        include __DIR__ . '/../../views/layout.php';
    }

    protected function redirect(string $path): void
    {
        $base = rtrim($this->config['base_path'], '/');
        header('Location: ' . $base . $path);
        exit;
    }
}
