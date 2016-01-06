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
            if($routePath == $this->request->getMethod() .':'. $this->request->getCurrentUri()) {
                $response = $routeCallback();

                if(!$response instanceof Response) {
                    throw new \Exception('Callback has to return Response instance');
                }

                $response->render();
            }
        }
    }

    public function addRoute($method, $routePath, $routeCallback)
    {
        $this->routes[$method . ':' . $routePath] = $routeCallback->bindTo($this, __CLASS__);
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getRoutes()
    {
        return $this->routes;
    }
}
