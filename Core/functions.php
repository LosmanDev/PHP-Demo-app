<?php

use Core\Response;

function dd($value)
{
    echo '<pre>';

    var_dump($value);

    echo '<pre>';

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}

function abort($code = 404)
{
    //Gets or sets the HTTP response status code.
    http_response_code($code);

    //Status 404 page
    require base_path("views/{$code}.php");

    // Determined that the requested route doesn't exist (and you've shown the user an error page), kill it.
    die();
}



function urlIs($value)
{
    //$_SERVER is an array containing information such as headers, paths, and script locations
    return  $_SERVER['REQUEST_URI'] === $value;
}


function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}
