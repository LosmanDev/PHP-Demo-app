<?php

use Core\Response;

function dd($value)
{
    // Display the value in a formatted way
    echo '<pre>';

    // Dump the value for inspection
    var_dump($value);

    echo '<pre>';

    // Stop the execution of the script
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    // Check if the condition is false
    if (! $condition) {
        // Abort the execution with the specified status code
        abort($status);
    }
}

function abort($code = 404)
{
    // Set the HTTP response status code
    http_response_code($code);

    // Display the corresponding error page
    require base_path("views/{$code}.php");

    // Stop the execution of the script
    die();
}

function urlIs($value)
{
    // Check if the current URL matches the given value
    return  $_SERVER['REQUEST_URI'] === $value;
}

function base_path($path)
{
    // Return the absolute path by concatenating the base path and the given path
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    // Extract the attributes into separate variables
    extract($attributes);

    // Require the view file
    require base_path('views/' . $path);
}

function login($user)
{
    $_SESSION['user'] = [
     'email' =>  $user['email']
    ];
}
