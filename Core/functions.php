<?php

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
