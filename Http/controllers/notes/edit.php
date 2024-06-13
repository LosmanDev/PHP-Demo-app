<?php
use Core\App; // Importing the App class from the Core namespace.
use Core\Database; // Importing the Database class from the Core namespace.

$db = App::resolve(Database::class); // Resolving the Database class using the App class.

$currentUserId = 1; // Setting the current user ID to 1.

$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->findOrFail(); // Querying the database to fetch the note with the specified ID.

authorize($note['user_id'] === $currentUserId); // Authorizing the user based on the note's user ID.

view('notes/edit.view.php', ['heading' => 'Edit Note', 'error' => [], 'note' => $note]); // Rendering the edit view with the necessary data.
