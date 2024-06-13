<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    //Add a new route to the router.
    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    // Add a new GET route to the router.
    public function get($uri, $controller)
    {
        return $this -> add('GET', $uri, $controller);
    }

    //Add a new POST route to the router.
    public function post($uri, $controller)
    {
        return $this -> add('POST', $uri, $controller);
    }

    // Add a new DELETE route to the router.
    public function delete($uri, $controller)
    {
        return $this -> add('DELETE', $uri, $controller);
    }

    //Add a new PATCH route to the router.
    public function patch($uri, $controller)
    {
        return $this -> add('PATCH', $uri, $controller);
    }

    //Add a new PUT route to the router.
    public function put($uri, $controller)
    {
        return $this -> add('PUT', $uri, $controller);
    }

    // Sets the middleware for the last defined route.
    public function only($key)
    {
        // string $key The middleware key to be set.
        $this -> routes[array_key_last($this -> routes)]['middleware' ] = $key;
        
        //$this The current instance of the Router class.
        return $this;
    }

    //Route the request to the appropriate controller based on the URI and method.
    public function route($uri, $method)
    {
        // Iterate over each route in the routes array.
        foreach ($this->routes as $route) {
            // Check if the URI and method of the current route match the requested URI and method.
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // Resolve the middleware for the current route.
                Middleware::resolve($route['middleware']);

                // Require the controller file associated with the current route.
                return require base_path('Http/controllers/'. $route['controller']);
            }
        }

        // If no matching route is found, abort the request and display a 404 error page.
        $this->abort();
    }

    //Abort the request and display a 404 error page.
    protected function abort($code = 404)
    {
        // Set the HTTP response status code.
        http_response_code($code);

        // Display the 404 error page.
        require base_path("views/{$code}.php");

        // Terminate the script execution.
        die();
    }
}
