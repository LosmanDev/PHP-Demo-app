<?php ;

// Route for the home page
$router->get('/', 'index.php');

// Route for the about page
$router->get('/about', 'about.php');

// Route for the contact page
$router->get('/contact', 'contact.php');

// Route for the notes page
$router->get('/notes', 'notes/index.php') -> only('auth');

// Route for showing a specific note
$router->get('/note', 'notes/show.php');

// Route for deleting a specific note
$router->delete('/note', 'notes/destroy.php');

// Route for creating a new note && Route for storing a new note
$router->get('/notes/create', 'notes/create.php');
$router->post('/notes', 'notes/store.php');

// Route for editing a specific note && Route for updating a specific note
$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');

// Route for registering a new user && Route for storing a new user
$router->get('/register', 'registration/create.php') -> only('guest');
$router->post('/register', 'registration/store.php') -> only('guest');

$router->get('/login', 'session/create.php') -> only('guest');
$router->post('/session', 'session/store.php') -> only('guest');

$router->delete('/session', 'session/destroy.php') -> only('auth');
