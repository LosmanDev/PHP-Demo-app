<?php

//Will parse and separate the path from thw query string
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//Created an array of uri's to route to controllers
$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];


function routToController($uri, $routes)
{
    //Checks if URI exists as a key example '/about' within routes array.
    if(array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        //function to handle status code.
        abort();
    }
}

//Default 404 code
function abort($code = 404)
{
    //Gets or sets the HTTP response status code.
    http_response_code($code);

    //Status 404 page
    require "views/{$code}.php";

    // Determined that the requested route doesn't exist (and you've shown the user an error page), kill it.
    die();
}


routToController($uri, $routes);
