<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this -> routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];

    }
    public function get($uri, $controller)
    {
        $this -> add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        $this -> add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        $this -> add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        $this -> add('PATCH', $uri, $controller);
    }
    public function put($uri, $controller)
    {
        $this -> add('PUT', $uri, $controller);
    }

    public function route($uri, $method)
    {
        foreach($this -> routes as $route) {
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this -> abort();
    }

    //Default 404 code
    protected function abort($code = 404)
    {
        //Gets or sets the HTTP response status code.
        http_response_code($code);

        //Status 404 page
        require base_path("views/{$code}.php");

        // Determined that the requested route doesn't exist (and you've shown the user an error page), kill it.
        die();
    }

}
