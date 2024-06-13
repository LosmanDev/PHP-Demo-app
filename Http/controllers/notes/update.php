<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class); // Get an instance of the Database class using the App class

$currentUserId = 1; // Set the current user ID to 1

$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_POST['id']])->findOrFail(); // Retrieve the note with the specified ID from the database

authorize($note['user_id'] === $currentUserId); // Check if the current user is authorized to edit the note

$errors = []; // Initialize an empty array to store validation errors

if (!Validator::string($_POST['body'], 1, 1000)) { // Validate the body of the note
    $errors['body'] = 'A body of no more than 1,000 characters is required'; // Add an error message if the validation fails
}

if (count($errors)) { // Check if there are any validation errors
    return view('note/edit.view.php', [ // Render the edit view with the error messages and the note data
        'heading' => 'Edit Note',
        'error' => $errors,
        'note' => $note
    ]);
};

$db->query('UPDATE notes SET body = :body WHERE id = :id', [ // Update the body of the note in the database
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

header('location: \notes'); // Redirect the user to the notes page
