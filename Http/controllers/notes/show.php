<?php ;

use Core\App;
use Core\Database;

$db = App::resolve(Database::class); // Resolving the Database class using the App class

$currentUserId = 1; // Setting the current user ID to 1

$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_GET['id']])->findOrFail(); // Retrieving the note from the database based on the provided ID

authorize($note['user_id'] === $currentUserId); // Checking if the current user is authorized to access the note

view('notes/show.view.php', [ // Rendering the 'notes/show.view.php' view
    'heading' => 'Note', // Setting the heading for the view
    'note' => $note // Passing the retrieved note to the view
]);
