<?php

namespace Core;

class Router
{
    protected $routes = [];

    /**
     * Add a new route to the router.
     *
     * @param string $method The HTTP method of the route.
     * @param string $uri The URI pattern of the route.
     * @param string $controller The controller for the route.
     */
    public function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    /**
     * Add a new GET route to the router.
     *
     * @param string $uri The URI pattern of the route.
     * @param string $controller The controller for the route.
     */
    public function get($uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    /**
     * Add a new POST route to the router.
     *
     * @param string $uri The URI pattern of the route.
     * @param string $controller The controller for the route.
     */
    public function post($uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    /**
     * Add a new DELETE route to the router.
     *
     * @param string $uri The URI pattern of the route.
     * @param string $controller The controller for the route.
     */
    public function delete($uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }

    /**
     * Add a new PATCH route to the router.
     *
     * @param string $uri The URI pattern of the route.
     * @param string $controller The controller for the route.
     */
    public function patch($uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }

    /**
     * Add a new PUT route to the router.
     *
     * @param string $uri The URI pattern of the route.
     * @param string $controller The controller for the route.
     */
    public function put($uri, $controller)
    {
        $this->add('PUT', $uri, $controller);
    }

    /**
     * Route the request to the appropriate controller based on the URI and method.
     *
     * @param string $uri The requested URI.
     * @param string $method The HTTP method of the request.
     * @return mixed The result of the controller action.
     */
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    /**
     * Abort the request and display a 404 error page.
     *
     * @param int $code The HTTP response code to use.
     */
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
