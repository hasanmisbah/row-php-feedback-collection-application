<?php

namespace Hasanmisbah\FeedbackApplication\Core\Router;

class RouteManager
{

    private $routes = [];

    protected $application = null;

    public function __construct($application)
    {
        $this->application = $application;
    }

    public function get($route, $action)
    {
        return $this->addRoute('GET', $route, $action);
    }

    public function post($route, $action)
    {
        return $this->addRoute('POST', $route, $action);
    }

    public function patch($route, $action)
    {
        return $this->addRoute('PATCH', $route, $action);
    }

    public function put($route, $action)
    {
        return $this->addRoute('PUT', $route, $action);
    }

    public function delete($route, $action)
    {
        return $this->addRoute('DELETE', $route, $action);
    }

    private function addRoute($method, $route, $action)
    {
        $this->routes[$method][$route] = $action;
        return $this;
    }

    public function handle()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach ($this->routes[$method] as $route => $action) {

            $route = preg_replace('/\{[a-zA-Z]+\}/', '([a-zA-Z0-9-_]+)', $route);
            $route = str_replace('/', '\/', $route);

            if (preg_match('/^' . $route . '$/', $uri, $matches)) {
                array_shift($matches);

                if (is_callable($action)) {
                    $response =  $this->application->call($action, $matches);
                    echo $response;
                    return;
                }
            }
        }

        http_response_code(404);
        echo '404 Not Found';
    }
}
