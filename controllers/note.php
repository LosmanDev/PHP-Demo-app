<?php ;

$config = require('config.php');

$db = new Database($config['database']);

$heading = "Note";

$note = $db ->query('select * from notes where id = :id', ['id' => $_GET['id']]) -> fetch();

if (! $note) {
    abort();
}

if ($note['user_id'] != 1) {
    abort(403);
}



require 'views/note.view.php';
