<?php
use Core\App; // Import the App class from the Core namespace
use Core\Container; // Import the Container class from the Core namespace
use Core\Database; // Import the Database class from the Core namespace

$container = new Container(); // Create a new instance of the Container class

$container->bind('Core\Database', function () { // Bind a callback function to the 'Core\Database' key in the container
    $config = require base_path('config.php'); // Load the configuration from the 'config.php' file
    return new Database($config['database']); // Create a new instance of the Database class with the database configuration
});

$db = $container->resolve('Core\Database'); // Resolve the 'Core\Database' key from the container and assign it to the $db variable

App::setContainer($container); // Set the container instance in the App class
