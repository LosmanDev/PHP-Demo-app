<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

// Form was submitted, so we need to delete the current note.
$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_POST['id']])->findOrFail();

// Check if the current user is authorized to delete the note.
authorize($note['user_id'] === $currentUserId);

// Delete the note from the database.
$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['id']
]);

// Redirect the user to the /notes page.
header('location: /notes');
exit();
