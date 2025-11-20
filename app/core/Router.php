<?php
namespace App\Core;

class Router
{
    private array $routes = [];
    private array $config;
    private array $middlewares = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function add(string $method, string $path, array $handler, array $middleware = []): void
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'handler' => $handler,
            'middleware' => $middleware,
        ];
    }

    public function dispatch(string $uri, string $method): void
    {
        $path = parse_url($uri, PHP_URL_PATH);
        $base = rtrim($this->config['base_path'], '/');
        if ($base && str_starts_with($path, $base)) {
            $path = substr($path, strlen($base));
            if ($path === '') {
                $path = '/';
            }
        }
        foreach ($this->routes as $route) {
            $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route['path']);
            $pattern = '#^' . $pattern . '$#';
            if ($route['method'] === strtoupper($method) && preg_match($pattern, $path, $matches)) {
                array_shift($matches);
                $this->runMiddleware($route['middleware']);
                [$controllerName, $action] = $route['handler'];
                $controllerClass = 'App\\Controllers\\' . $controllerName;
                if (!class_exists($controllerClass)) {
                    throw new \RuntimeException("Controller {$controllerClass} not found");
                }
                $controller = new $controllerClass($this->config);
                call_user_func_array([$controller, $action], $matches);
                return;
            }
        }
        http_response_code(404);
        echo '404 Not Found';
    }

    public function registerMiddleware(string $name, callable $callback): void
    {
        $this->middlewares[$name] = $callback;
    }

    private function runMiddleware(array $names): void
    {
        foreach ($names as $name) {
            if (isset($this->middlewares[$name])) {
                call_user_func($this->middlewares[$name]);
            }
        }
    }
}
