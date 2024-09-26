<?php

class Router
{
    private $routes = [];

    public function add($method, $path, $controller, $action)
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch($requestUri, $requestMethod)
    {
        // Extraer la parte de la URI sin la cadena de consulta
        $uri = parse_url($requestUri, PHP_URL_PATH);
        $query = parse_url($requestUri, PHP_URL_QUERY);
        
        foreach ($this->routes as $route) {
            if ($this->match($route['path'], $uri, $params) && $route['method'] === strtoupper($requestMethod)) {
                $controllerName = $route['controller'];
                $actionName = $route['action'];
                $controller = new $controllerName();
                return $controller->$actionName($params);
            }
        }

        // Redirigir al controlador de errores
        header("HTTP/1.0 404 Not Found");
        exit();
    }

    private function match($routePath, $requestUri, &$params)
    {
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_]+)', $routePath);
        $pattern = str_replace('/', '\/', $pattern);
        $pattern = "#^$pattern$#";
        
        if (preg_match($pattern, $requestUri, $matches)) {
            $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
            return true;
        }

        return false;
    }
}
