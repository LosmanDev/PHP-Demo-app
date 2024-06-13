<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class); // Get an instance of the Database class using the App class

$errors = []; // Initialize an empty array to store validation errors

if (! Validator::string($_POST['body'], 1, 1000)) { // Check if the 'body' field in the $_POST array is a string with a length between 1 and 1000 characters
    $errors['body'] = 'A body of no more than 1,000 characters is required'; // If the validation fails, add an error message to the $errors array
}

if (! empty($errors)) { // Check if there are any validation errors
    return view('notes/create.view.php', [ // If there are errors, return the 'notes/create.view.php' view with the error messages
        'heading' => 'Create Note',
        'error' => $errors
    ]);
};

if (empty($errors)) { // Check if there are no validation errors
    $db->query('INSERT INTO `notes` (`body`, `user_id`) VALUES(:body, :user_id)', [ // Insert a new record into the 'notes' table with the 'body' and 'user_id' values
        'body' => $_POST['body'],
        'user_id' => 1,
    ]);
    header('location: /notes'); // Redirect the user to the '/notes' page
    die(); // Terminate the script execution
}
