<?php
session_start();

$config = require __DIR__ . '/config.php';

$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
$detectedBasePath = rtrim($scriptDir, '/');
if ($detectedBasePath === '/' || $detectedBasePath === '.') {
    $detectedBasePath = '';
}
// If the request was rewritten to a /public front controller, strip it from the base path
if (str_ends_with($detectedBasePath, '/public')) {
    $detectedBasePath = rtrim(substr($detectedBasePath, 0, -7), '/');
}
$config['base_path'] = $detectedBasePath;

spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/app/';
    if (str_starts_with($class, $prefix)) {
        $relative = substr($class, strlen($prefix));
        $file = $baseDir . str_replace('\\', '/', $relative) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

use App\Core\Router;
use App\Core\AuthMiddleware;

$router = new Router($config);
$router->registerMiddleware('auth', function () use ($config) {
    AuthMiddleware::handle($config);
});

$routes = require __DIR__ . '/routes.php';
foreach ($routes as $route) {
    [$method, $path, $handler, $middleware] = array_pad($route, 4, []);
    $router->add($method, $path, $handler, $middleware);
}

$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
