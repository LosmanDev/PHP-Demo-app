<?php ;

// Route for the home page
$router->get('/', 'controllers/index.php');

// Route for the about page
$router->get('/about', 'controllers/about.php');

// Route for the contact page
$router->get('/contact', 'controllers/contact.php');

// Route for the notes page
$router->get('/notes', 'controllers/notes/index.php') -> only('auth');

// Route for showing a specific note
$router->get('/note', 'controllers/notes/show.php');

// Route for deleting a specific note
$router->delete('/note', 'controllers/notes/destroy.php');

// Route for creating a new note && Route for storing a new note
$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/store.php');

// Route for editing a specific note && Route for updating a specific note
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');

// Route for registering a new user && Route for storing a new user
$router->get('/register', 'controllers/registration/create.php') -> only('guest');
$router->post('/register', 'controllers/registration/store.php');

$router->get('/login', 'controllers/session/create.php') -> only('guest');
$router->post('/session', 'controllers/session/store.php') -> only('guest');
