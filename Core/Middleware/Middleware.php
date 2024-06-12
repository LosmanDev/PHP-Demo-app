<?php

namespace Core\Middleware;

class Middleware
{
    // Define a constant array MAP that maps keys to middleware classes
    const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    // Define a public static method resolve that takes a key as a parameter
    public static function resolve($key)
    {

        // Check if $key is empty
        if (!$key) {
            return;
        }

        // Get the middleware class based on the $key from the MAP array
        $middleware = static::MAP[$key] ?? false;

        // If no matching middleware found, throw an exception
        if (!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'");
        }

        // Create an instance of the middleware class and call the handle method
        (new $middleware)->handle();
    }
}
