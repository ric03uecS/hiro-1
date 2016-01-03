<?php

namespace Hiro;

class Router
{
    protected $routes = [];
    protected $currentRoute;

    public function __construct($request) {
        $this->request = $request;
    }

    public function dispatch() {
        foreach ($this->routes as $routePath => $routeCallback) {
            if($routePath == $this->request->getCurrentUri()) {
                $response = $routeCallback();
                $response->render();
                exit(0);
            }
        }
    }

    public function addRoute($routePath, $routeCallback)
    {
        $this->routes[$routePath] = $routeCallback->bindTo($this, __CLASS__);
    }

    public function getRequest()
    {
        return $this->request;
    }
}
