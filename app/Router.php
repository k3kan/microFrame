<?php

namespace app;

class Router
{
    protected array $routes = [];

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    private function getUri(): string
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    public function run()
    {
        $uri = $this->getUri();
        foreach ($this->routes as $pattern => $path) {
            if (preg_match("~^{$pattern}$~", $uri)) {
                $route = preg_replace("~^{$pattern}$~", $path, $uri);
                $segments = explode('/', $route);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));

                $class = 'controllers' . DIRECTORY_SEPARATOR . $controllerName;
                $controllerObject = new  $class;
                call_user_func_array(array($controllerObject, $actionName), $segments);
            }
        }
    }
}