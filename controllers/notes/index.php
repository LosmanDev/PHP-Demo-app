<?php ;

use Core\App;
use Core\Database;

// Resolve the Database class using the App class
$db = App::resolve(Database::class);

// Query the database to retrieve all notes for user with ID 1
$notes = $db->query('select * from notes where user_id = 1')->get();

// Render the 'notes/index.view.php' view with the heading 'My Notes' and the retrieved notes
view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);
